<?php

namespace CoLibraryBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Collection controller
 * 
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class CollectionController extends Controller
{
    /**
     * @Route("/collection", name="collection_index")
     * @ Template("CoLibraryBundle::Collection/index.html.twig")
     * @Template
     */
    public function indexAction()
    {
        return [];
    }
}