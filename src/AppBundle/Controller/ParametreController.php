<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Parametre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Parametre controller.
 *
 * @Route("parametre")
 */
class ParametreController extends Controller
{
    /**
     * Lists all parametre entities.
     *
     * @Route("/", name="parametre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parametres = $em->getRepository('AppBundle:Parametre')->findAll();

        return $this->render('parametre/index.html.twig', array(
            'parametres' => $parametres,
        ));
    }

    /**
     * Creates a new parametre entity.
     *
     * @Route("/new", name="parametre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parametre = new Parametre();
        $form = $this->createForm('AppBundle\Form\ParametreType', $parametre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parametre);
            $em->flush();

            return $this->redirectToRoute('parametre_show', array('id' => $parametre->getId()));
        }

        return $this->render('parametre/new.html.twig', array(
            'parametre' => $parametre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a parametre entity.
     *
     * @Route("/{id}", name="parametre_show")
     * @Method("GET")
     */
    public function showAction(Parametre $parametre)
    {
        $deleteForm = $this->createDeleteForm($parametre);

        return $this->render('parametre/show.html.twig', array(
            'parametre' => $parametre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing parametre entity.
     *
     * @Route("/{id}/edit", name="parametre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Parametre $parametre)
    {
        $deleteForm = $this->createDeleteForm($parametre);
        $editForm = $this->createForm('AppBundle\Form\ParametreType', $parametre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parametre_index', array('id' => $parametre->getId()));
        }

        return $this->render('parametre/edit.html.twig', array(
            'parametre' => $parametre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a parametre entity.
     *
     * @Route("/{id}", name="parametre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Parametre $parametre)
    {
        $form = $this->createDeleteForm($parametre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parametre);
            $em->flush();
        }

        return $this->redirectToRoute('parametre_index');
    }

    /**
     * Creates a form to delete a parametre entity.
     *
     * @param Parametre $parametre The parametre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parametre $parametre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parametre_delete', array('id' => $parametre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
