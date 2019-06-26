<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * Film controller.
 *
 * @Route("film")
 */
class FilmController extends Controller
{
    /**
     * Lists all film entities.
     *
     * @Route("/", name="film_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $films = $em->getRepository('AppBundle:Film')->findAll();

        foreach ($films as $film){
            $film->setRecetteFilm($this->calculateRecetteFilm($film));
            $film->setDepensesTotal($this->calculateDepencesFilm($film));
        }

        return $this->render('film/index.html.twig', array(
            'films' => $films,
        ));
    }

    /**
     * Creates a new film entity.
     *
     * @Route("/new", name="film_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $film = new Film();
        $form = $this->createForm('AppBundle\Form\FilmType', $film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            return $this->redirectToRoute('film_index', array('id' => $film->getId()));
        }

        return $this->render('film/new.html.twig', array(
            'film' => $film,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing film entity.
     *
     * @Route("/{id}/edit", name="film_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Film $film)
    {
        $deleteForm = $this->createDeleteForm($film);
        $editForm = $this->createForm('AppBundle\Form\FilmType', $film);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('film_edit', array('id' => $film->getId()));
        }

        return $this->render('film/edit.html.twig', array(
            'film' => $film,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a film entity.
     *
     * @Route("/delete/{id}", name="film_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Film $film)
    {
        $form = $this->createDeleteForm($film);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($film);
            $em->flush();
        }

        return $this->redirectToRoute('film_index');
    }

    /**
     * Creates a form to delete a film entity.
     *
     * @param Film $film The film entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Film $film)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('film_delete', array('id' => $film->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * @Route("/search-film", name="search_film")
     * @Method({"GET","POST"})
     */
    public function searchAction(Request $request)
    {
        $qs = $request->query->get('q');

        $films = $this->get('app.repository.film')->findLike($qs);

        return $this->render('film/search.json.twig', ['films' => $films]);
    }
    /**
     * @Route("/get-film/{id}", name="get_film")
     * @ParamConverter("post", class="SensioBlogBundle:Post")
     * @Method("GET")
     */
    public function getAction($id = null)
    {
            $em = $this->getDoctrine()->getManager();
            $film = $em->getRepository('AppBundle:Film')->find($id);
        if (is_null($film)) {
            throw $this->createNotFoundException();
        }
        return new Response($film->getTitre());

    }


    /**
     * Finds and displays a film entity.
     *
     * @Route("/{id}", name="film_show")
     * @Method("GET")
     */
    public function showAction(Film $film)
    {
        $deleteForm = $this->createDeleteForm($film);

        return $this->render('film/show.html.twig', array(
            'film' => $film,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function calculateRecetteFilm(Film $film){

        $em = $this->getDoctrine()->getManager();

        $RAW_QUERY = 'SELECT SUM(recette) FROM bordereau_salle where bordereau_salle.film_id = :film_id ;';
        $RAW_QUERY1 = 'SELECT SUM(recette) FROM bordereau_region where bordereau_region.film_id = :film_id ;';

        $statement = $em->getConnection()->prepare($RAW_QUERY);
        $statement1 = $em->getConnection()->prepare($RAW_QUERY1);

        $statement->bindValue('film_id', $film->getId() );
        $statement1->bindValue('film_id', $film->getId() );

        $statement->execute();
        $statement1->execute();

        $result = $statement->fetchColumn(0);
        $result1 = $statement->fetchColumn(0);

        return $result + $result1;
    }

    public function calculateDepencesFilm(Film $film){

        $em = $this->getDoctrine()->getManager();

        $RAW_QUERY = 'SELECT SUM(valeur) FROM depenses where depenses.film_id = :film_id ;';

        $statement = $em->getConnection()->prepare($RAW_QUERY);

        $statement->bindValue('film_id', $film->getId() );

        $statement->execute();

        $result = $statement->fetchColumn(0);

        return $result ;
    }

}
