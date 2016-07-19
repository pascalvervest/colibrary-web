<?php

namespace CoLibraryBundle\Controller;

use CoLibraryBundle\Entity\Item;
use CoLibraryBundle\Grid\CollectionGridType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CollectionController
 * @package CoLibraryBundle\Controller
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class CollectionController extends Controller
{
    /**
     * @Route("/collection", name="collection_index")
     * @Template
     *
     * @return array
     */
    public function indexAction()
    {
        $items = $this
            ->getDoctrine()
            ->getRepository(Item::class)
            ->findAll();

        $grid = $this->get('grid_factory')->createGrid(CollectionGridType::class);

        return [
            'data' => $items,
            'grid' => $grid->createView(),
        ];
    }
}
