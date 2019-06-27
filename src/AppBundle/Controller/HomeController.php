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
    public function indexDepensesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $depenses = $em->getRepository('AppBundle:Depenses')->findAll();

        return $this->render('home/depensesTotal.html.twig', array(
            'depenses' => $depenses,
        ));
    }


}
