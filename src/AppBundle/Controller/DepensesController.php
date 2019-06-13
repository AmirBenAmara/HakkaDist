<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Depenses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Depense controller.
 *
 * @Route("depenses")
 */
class DepensesController extends Controller
{
    /**
     * Lists all depense entities.
     *
     * @Route("/", name="depenses_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $depenses = $em->getRepository('AppBundle:Depenses')->findAll();

        return $this->render('depenses/index.html.twig', array(
            'depenses' => $depenses,
        ));
    }

    /**
     * Creates a new depense entity.
     *
     * @Route("/new", name="depenses_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $depense = new Depenses();
        $form = $this->createForm('AppBundle\Form\DepensesType', $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($depense);
            $em->flush();

            return $this->redirectToRoute('depenses_show', array('id' => $depense->getId()));
        }

        return $this->render('depenses/new.html.twig', array(
            'depense' => $depense,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a depense entity.
     *
     * @Route("/{id}", name="depenses_show")
     * @Method("GET")
     */
    public function showAction(Depenses $depense)
    {
        $deleteForm = $this->createDeleteForm($depense);

        return $this->render('depenses/show.html.twig', array(
            'depense' => $depense,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing depense entity.
     *
     * @Route("/{id}/edit", name="depenses_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Depenses $depense)
    {
        $deleteForm = $this->createDeleteForm($depense);
        $editForm = $this->createForm('AppBundle\Form\DepensesType', $depense);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('depenses_edit', array('id' => $depense->getId()));
        }

        return $this->render('depenses/edit.html.twig', array(
            'depense' => $depense,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a depense entity.
     *
     * @Route("/{id}", name="depenses_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Depenses $depense)
    {
        $form = $this->createDeleteForm($depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($depense);
            $em->flush();
        }

        return $this->redirectToRoute('depenses_index');
    }

    /**
     * Creates a form to delete a depense entity.
     *
     * @param Depenses $depense The depense entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Depenses $depense)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('depenses_delete', array('id' => $depense->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
