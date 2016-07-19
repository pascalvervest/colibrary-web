<?php

namespace CoLibraryBundle\Controller;

use CoLibraryBundle\Entity\Item;
use CoLibraryBundle\Grid\CollectionGridType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use CoLibraryBundle\Form\ItemType;

/**
 * Collection controller
 * 
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class CollectionController extends Controller
{
    /**
     * @Route("/collection", name="collection_index")
     * @Template
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
    
    /**
     * @Route("/collection/add", name="collection_add")
     * @Template
     * 
     * @param Request $request
     * @return type
     */
    public function addAction(Request $request)
    {
        $item = new Item;
        $form = $this->createForm(ItemType::class, $item);
        
        $form->handleRequest($request);
        
        // Validate form and save to database
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();
            
            return $this->redirectToRoute('collection_index');
        }
        
        return [
            'form' => $form->createView()
        ];
    }
}