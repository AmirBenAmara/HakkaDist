<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BordereauRegion;
use AppBundle\Entity\SeanceRegion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Seanceregion controller.
 *
 * @Route("seanceregion")
 */
class SeanceRegionController extends Controller
{
    /**
     * Lists all seanceRegion entities.
     *
     * @Route("/", name="seanceregion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $seanceRegions = $em->getRepository('AppBundle:SeanceRegion')->findAll();

        return $this->render('seanceregion/index.html.twig', array(
            'seanceRegions' => $seanceRegions,
        ));
    }

    /**
     * Creates a new seanceRegion entity.
     *
     * @Route("/new/{id}", name="seanceregion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,BordereauRegion $brd)
    {
        $seanceRegion = new Seanceregion();
        $form = $this->createForm('AppBundle\Form\SeanceRegionType', $seanceRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seanceRegion->setBordereauRegion($brd);

            $em = $this->getDoctrine()->getManager();
            $em->persist($seanceRegion);
            $em->flush();
            $this->updateBordereauRecette($brd);
            return $this->redirectToRoute('bordereauregion_show', array('id' => $brd->getId()));
        }

        return $this->render('seanceregion/new.html.twig', array(
            'seanceRegion' => $seanceRegion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a seanceRegion entity.
     *
     * @Route("/{id}", name="seanceregion_show")
     * @Method("GET")
     */
    public function showAction(SeanceRegion $seanceRegion)
    {
        $deleteForm = $this->createDeleteForm($seanceRegion);

        return $this->render('seanceregion/show.html.twig', array(
            'seanceRegion' => $seanceRegion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing seanceRegion entity.
     *
     * @Route("/{id}/edit", name="seanceregion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SeanceRegion $seanceRegion)
    {
        $deleteForm = $this->createDeleteForm($seanceRegion);
        $editForm = $this->createForm('AppBundle\Form\SeanceRegionType', $seanceRegion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $brd =  $this->getDoctrine()->getManager()->getRepository('AppBundle:BordereauRegion')
                ->findOneBy(array('id'=>$seanceRegion->getBordereauRegion()->getId()));
            $this->updateBordereauRecette($brd);
            return $this->redirectToRoute('seanceregion_edit', array('id' => $seanceRegion->getId()));
        }

        return $this->render('seanceregion/edit.html.twig', array(
            'seanceRegion' => $seanceRegion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a seanceRegion entity.
     *
     * @Route("/delete/{id}", name="seanceregion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SeanceRegion $seanceRegion)
    {
        $form = $this->createDeleteForm($seanceRegion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $brd = $em->getRepository('AppBundle:BordereauRegion')
                ->findOneBy(array('id'=>$seanceRegion->getBordereauRegion()->getId()));
            $em->remove($seanceRegion);
            $em->flush();

            $this->updateBordereauRecette($brd);

        }

        return $this->redirectToRoute('bordereauregion_show', array('id' => $brd->getId()));
    }

    /**
     * Creates a form to delete a seanceRegion entity.
     *
     * @param SeanceRegion $seanceRegion The seanceRegion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SeanceRegion $seanceRegion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seanceregion_delete', array('id' => $seanceRegion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    private function updateBordereauRecette(BordereauRegion $brd)
    {
        $em = $this->getDoctrine()->getManager();
        $seances = $em->getRepository('AppBundle:SeanceRegion')->findBy(array('bordereau_region'=>$brd->getId()));
        $sum = 0;
        foreach ($seances as $seance){
            $sum += $seance->getRecetteSeance();
        }
        $brd->setRecette($sum);
        $em->persist($brd);
        $em->flush();

    }
}
