<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/home", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/", name="main")
     */
    public function mainAction(Request $request)
    {
        if ($this->isGranted('ROLE_USER') == false) {
            $this->redirectToRoute("fos_user_security_login");
        }
        else {
            return $this->render('default/index.html.twig');


        }

        // replace this example code with whatever you need

    }


}
