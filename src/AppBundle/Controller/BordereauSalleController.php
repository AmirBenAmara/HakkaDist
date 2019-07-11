<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BordereauSalle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bordereausalle controller.
 *
 * @Route("brdsalle")
 */
class BordereauSalleController extends Controller
{
    /**
     * Lists all bordereauSalle entities.
     *
     * @Route("/", name="brdsalle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bordereauSalles = $em->getRepository('AppBundle:BordereauSalle')->findAll();

        return $this->render('bordereausalle/index.html.twig', array(
            'bordereauSalles' => $bordereauSalles,
        ));
    }

    /**
     * Creates a new bordereauSalle entity.
     *
     * @Route("/new", name="brdsalle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bordereauSalle = new Bordereausalle();
        $form = $this->createForm('AppBundle\Form\BordereauSalleType', $bordereauSalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bordereauSalle);
            $em->flush();

            return $this->redirectToRoute('brdsalle_show', array('id' => $bordereauSalle->getId()));
        }

        return $this->render('bordereausalle/new.html.twig', array(
            'bordereauSalle' => $bordereauSalle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bordereauSalle entity.
     *
     * @Route("/{id}", name="brdsalle_show")
     * @Method("GET")
     */
    public function showAction(BordereauSalle $bordereauSalle)
    {

        $em = $this->getDoctrine()->getManager();

        $parametre = $em->getRepository('AppBundle:Parametre')->find(1);

        $deleteForm = $this->createDeleteForm($bordereauSalle);

        return $this->render('bordereausalle/show.html.twig', array(
            'bordereauSalle' => $bordereauSalle,
            'delete_form' => $deleteForm->createView(),
            'parametre' => $parametre,
        ));
    }

    /**
     * Displays a form to edit an existing bordereauSalle entity.
     *
     * @Route("/{id}/edit", name="brdsalle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BordereauSalle $bordereauSalle)
    {
        $deleteForm = $this->createDeleteForm($bordereauSalle);
        $editForm = $this->createForm('AppBundle\Form\BordereauSalleType', $bordereauSalle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('brdsalle_edit', array('id' => $bordereauSalle->getId()));
        }

        return $this->render('bordereausalle/edit.html.twig', array(
            'bordereauSalle' => $bordereauSalle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bordereauSalle entity.
     *
     * @Route("/{id}", name="brdsalle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BordereauSalle $bordereauSalle)
    {
        $form = $this->createDeleteForm($bordereauSalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bordereauSalle);
            $em->flush();
        }

        return $this->redirectToRoute('brdsalle_index');
    }

    /**
     * Creates a form to delete a bordereauSalle entity.
     *
     * @param BordereauSalle $bordereauSalle The bordereauSalle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BordereauSalle $bordereauSalle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('brdsalle_delete', array('id' => $bordereauSalle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
