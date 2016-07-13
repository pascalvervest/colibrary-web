<?php

namespace CoLibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/lala")
     */
    public function indexAction()
    {
        return $this->render('CoLibraryBundle:Default:index.html.twig');
    }
}
