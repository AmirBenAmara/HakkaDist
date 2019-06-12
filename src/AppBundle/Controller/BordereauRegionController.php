<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BordereauRegion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Bordereauregion controller.
 *
 * @Route("bordereauregion")
 */
class BordereauRegionController extends Controller
{
    /**
     * Lists all bordereauRegion entities.
     *
     * @Route("/", name="bordereauregion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bordereauRegions = $em->getRepository('AppBundle:BordereauRegion')->findAll();

        return $this->render('bordereauregion/index.html.twig', array(
            'bordereauRegions' => $bordereauRegions,
        ));
    }

    /**
     * Creates a new bordereauRegion entity.
     *
     * @Route("/new", name="bordereauregion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bordereauRegion = new Bordereauregion();
        $form = $this->createForm('AppBundle\Form\BordereauRegionType', $bordereauRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bordereauRegion);
            $em->flush();

            return $this->redirectToRoute('bordereauregion_show', array('id' => $bordereauRegion->getId()));
        }

        return $this->render('bordereauregion/new.html.twig', array(
            'bordereauRegion' => $bordereauRegion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bordereauRegion entity.
     *
     * @Route("/{id}", name="bordereauregion_show")
     * @Method("GET")
     */
    public function showAction(BordereauRegion $bordereauRegion)
    {
        $deleteForm = $this->createDeleteForm($bordereauRegion);

        return $this->render('bordereauregion/show.html.twig', array(
            'bordereauRegion' => $bordereauRegion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bordereauRegion entity.
     *
     * @Route("/{id}/edit", name="bordereauregion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BordereauRegion $bordereauRegion)
    {
        $deleteForm = $this->createDeleteForm($bordereauRegion);
        $editForm = $this->createForm('AppBundle\Form\BordereauRegionType', $bordereauRegion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bordereauregion_edit', array('id' => $bordereauRegion->getId()));
        }

        return $this->render('bordereauregion/edit.html.twig', array(
            'bordereauRegion' => $bordereauRegion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bordereauRegion entity.
     *
     * @Route("/{id}", name="bordereauregion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BordereauRegion $bordereauRegion)
    {
        $form = $this->createDeleteForm($bordereauRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bordereauRegion);
            $em->flush();
        }

        return $this->redirectToRoute('bordereauregion_index');
    }

    /**
     * Creates a form to delete a bordereauRegion entity.
     *
     * @param BordereauRegion $bordereauRegion The bordereauRegion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BordereauRegion $bordereauRegion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bordereauregion_delete', array('id' => $bordereauRegion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
