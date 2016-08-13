<?php

namespace CoLibraryBundle\Controller;

use CoLibraryBundle\Entity\Item;
use CoLibraryBundle\Entity\Collection;
use CoLibraryBundle\Form\CollectionType;
use CoLibraryBundle\Grid\CollectionGridType;
use CoLibraryBundle\Grid\ItemGridType;
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
     * @Route("/", name="collection_index")
     * @Template
     *
     * @return array
     */
    public function indexAction()
    {
        $items = $this
            ->getDoctrine()
            ->getRepository(Collection::class)
            ->findAll();

        $grid = $this->get('grid_factory')->createGrid(CollectionGridType::class);

        return [
            'data' => $items,
            'grid' => $grid->createView(),
        ];
    }

    /**
     * @Route("/view/{id}", name="collection_view")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function viewAction(Request $request)
    {
        $items = $this
            ->getDoctrine()
            ->getRepository(Item::class)
            ->findBy([
                'collection' => $request->get('id')
        ]);

        $grid = $this->get('grid_factory')->createGrid(ItemGridType::class);

        return [
            'data' => $items,
            'grid' => $grid->createView(),
        ];
    }

    /**
     * @Route("/add", name="collection_add")
     * @Template
     */
    public function addAction(Request $request)
    {
        $item = new Collection;
        $form = $this->createForm(CollectionType::class, $item);

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

    /**
     * @Route("/edit/{id}", name="collection_edit")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function editAction(Request $request)
    {
        $item = $this->getDoctrine()
            ->getRepository(Collection::class)
            ->findOneById($request->get('id'));

        if (!$item) {
            throw new NotFoundHttpException('Item not found');
        }

        $form = $this->createForm(CollectionType::class, $item);
        $form->handleRequest($request);

        // Validate form and save to database
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();

            return $this->redirectToRoute('collection_index');
        }

        return [
            'form' => $form->createView(),
        ];
    }
}
