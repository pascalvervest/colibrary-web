<?php

namespace CoLibraryBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * CoLibraryBundle\Controller\IndexController
 *
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class IndexController extends Controller
{
    /**
     * @Route("/", name="index_index")
     * @Template
     */
    public function indexAction()
    {
        return [];
    }
}
