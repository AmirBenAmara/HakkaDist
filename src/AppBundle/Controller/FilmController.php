<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use AppBundle\Repository\FilmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

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

            return $this->redirectToRoute('film_show', array('id' => $film->getIdfilm()));
        }

        return $this->render('film/new.html.twig', array(
            'film' => $film,
            'form' => $form->createView(),
        ));
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

            return $this->redirectToRoute('film_edit', array('idFilm' => $film->getIdfilm()));
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
     * @Route("/{id}", name="film_delete")
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
            ->setAction($this->generateUrl('film_delete', array('idFilm' => $film->getIdfilm())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * @Route("/search-film", name="search_film", defaults={"_format"="json"})
     * @Method("GET")
     */
    public function searchAction(FilmRepository $repo, Request $request)
    {
        $qs = $request->query->get('q');
        $em = $this->getDoctrine()->getManager();

        $films = $em->getRepository('AppBundle:Film')->findLike($qs);
        return $this->render('film/search.json.twig', ['films' => $films]);
    }
    /**
     * @Route("/get-film/{id}", name="get_film", defaults={"_format"="json"})
     * @Method("GET")
     */
    public function getAction($id , FilmRepository $repo)
    {
        if (null === $film = $repo->find($id)) {
            throw $this->createNotFoundException();
        }
        return $this->json($film->getTitre());
}
}
