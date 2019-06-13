<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Salle controller.
 *
 * @Route("salle")
 */
class SalleController extends Controller
{
    /**
     * Lists all salle entities.
     *
     * @Route("/", name="salle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $salles = $em->getRepository('AppBundle:Salle')->findAll();

        return $this->render('salle/index.html.twig', array(
            'salles' => $salles,
        ));
    }

    /**
     * Creates a new salle entity.
     *
     * @Route("/new", name="salle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $salle = new Salle();
        $form = $this->createForm('AppBundle\Form\SalleType', $salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();

            return $this->redirectToRoute('salle_show', array('id' => $salle->getId()));
        }

        return $this->render('salle/new.html.twig', array(
            'salle' => $salle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a salle entity.
     *
     * @Route("/{id}", name="salle_show")
     * @Method("GET")
     */
    public function showAction(Salle $salle)
    {
        $deleteForm = $this->createDeleteForm($salle);

        return $this->render('salle/show.html.twig', array(
            'salle' => $salle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing salle entity.
     *
     * @Route("/{id}/edit", name="salle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Salle $salle)
    {
        $deleteForm = $this->createDeleteForm($salle);
        $editForm = $this->createForm('AppBundle\Form\SalleType', $salle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('salle_edit', array('id' => $salle->getId()));
        }

        return $this->render('salle/edit.html.twig', array(
            'salle' => $salle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a salle entity.
     *
     * @Route("/{id}", name="salle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Salle $salle)
    {
        $form = $this->createDeleteForm($salle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($salle);
            $em->flush();
        }

        return $this->redirectToRoute('salle_index');
    }

    /**
     * Creates a form to delete a salle entity.
     *
     * @param Salle $salle The salle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Salle $salle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('salle_delete', array('id' => $salle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
