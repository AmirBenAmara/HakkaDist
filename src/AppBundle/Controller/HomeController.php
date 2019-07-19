<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Salle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Salle controller.
 *
 * @Route("home")
 */
class HomeController extends Controller
{
    /**
     * Lists all depense entities.
     *
     * @Route("/", name="depenses_home")
     * @Method("GET")
     */
    public function depensesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $depenses = $em->getRepository('AppBundle:Depenses')->findAll();

        return $this->render('home/depenses.html.twig', array(
            'depenses' => $depenses,
        ));
    }


    /**
     *
     *
     * @Route("/entrees", name="entrees_home")
     * @Method("GET")
     */
    public function entreesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bordereauSalles = $em->getRepository('AppBundle:BordereauSalle')->findBy(array(),array('film'=>'asc','salle'=>'asc'));

        return $this->render('home/entrees.html.twig', array(
            'bordereauSalles' => $bordereauSalles,
        ));
    }

    /**
     *
     *
     * @Route("/recettes", name="recettes_home")
     * @Method("GET")
     */
    public function recettesAction()
    {



            $em = $this->getDoctrine()->getManager();

            $bordereauSalles = $em->getRepository('AppBundle:BordereauSalle')->findBy(array(),array('film'=>'asc','salle'=>'asc'));

            return $this->render('home/recettes.html.twig', array(
                'bordereauSalles' => $bordereauSalles,
            ));


    }


    /**
     *
     *
     * @Route("/partDistribuable", name="partDistribuable_home")
     * @Method("GET")
     */
    public function partDistribuableAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bordereauSalles = $em->getRepository('AppBundle:BordereauSalle')->findAll();

        return $this->render('home/partDistribuable.html.twig', array(
            'bordereauSalles' => $bordereauSalles,
        ));
    }




}
