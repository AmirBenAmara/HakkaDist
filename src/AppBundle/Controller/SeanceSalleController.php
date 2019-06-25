<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BordereauSalle;
use AppBundle\Entity\SeanceSalle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Seancesalle controller.
 *
 * @Route("seancesalle")
 */
class SeanceSalleController extends Controller
{
    /**
     * Lists all seanceSalle entities.
     *
     * @Route("/", name="seancesalle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $seanceSalles = $em->getRepository('AppBundle:SeanceSalle')->findAll();

        return $this->render('seancesalle/index.html.twig', array(
            'seanceSalles' => $seanceSalles,
        ));
    }

    /**
     * Creates a new seanceSalle entity.
     *
     * @Route("/new/{id}", name="seancesalle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,BordereauSalle $brd)
    {
        $seanceSalle = new Seancesalle();
        $form = $this->createForm('AppBundle\Form\SeanceSalleType', $seanceSalle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seanceSalle->setBordereauSalle($brd);
            $em = $this->getDoctrine()->getManager();
            $em->persist($seanceSalle);
            $em->flush();

            return $this->redirectToRoute('brdsalle_show', array('id' => $brd->getId()));

        }

        return $this->render('seancesalle/new.html.twig', array(
            'seanceSalle' => $seanceSalle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a seanceSalle entity.
     *
     * @Route("/{id}", name="seancesalle_show")
     * @Method("GET")
     */
    public function showAction(SeanceSalle $seanceSalle)
    {
        $deleteForm = $this->createDeleteForm($seanceSalle);

        return $this->render('seancesalle/show.html.twig', array(
            'seanceSalle' => $seanceSalle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing seanceSalle entity.
     *
     * @Route("/{id}/edit", name="seancesalle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SeanceSalle $seanceSalle)
    {
        $deleteForm = $this->createDeleteForm($seanceSalle);
        $editForm = $this->createForm('AppBundle\Form\SeanceSalleType', $seanceSalle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seancesalle_edit', array('id' => $seanceSalle->getId()));
        }

        return $this->render('seancesalle/edit.html.twig', array(
            'seanceSalle' => $seanceSalle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a seanceSalle entity.
     *
     * @Route("/{id}", name="seancesalle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SeanceSalle $seanceSalle)
    {
        $form = $this->createDeleteForm($seanceSalle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seanceSalle);
            $em->flush();
        }

        return $this->redirectToRoute('seancesalle_index');
    }

    /**
     * Creates a form to delete a seanceSalle entity.
     *
     * @param SeanceSalle $seanceSalle The seanceSalle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SeanceSalle $seanceSalle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seancesalle_delete', array('id' => $seanceSalle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
