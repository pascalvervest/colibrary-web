<?php

namespace CoLibraryBundle\Grid;

use Prezent\Grid\BaseGridType;
use Prezent\Grid\Extension\Core\Type\StringType;
use Prezent\Grid\GridBuilder;
use Prezent\Grid\GridView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CollectionGridType
 * @package CoLibraryBundle\Grid
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class ItemGridType extends BaseGridType
{
    /**
     * {@inheritdoc}
     */
    public function buildGrid(GridBuilder $builder, array $options = [])
    {
        $builder
            ->addColumn('id', StringType::class, [
                'label' => 'collection.item.entity.id',
            ])
            ->addColumn('artist', StringType::class, [
                'label' => 'collection.item.entity.artist'
            ])
            ->addColumn('title', StringType::class, [
                'label' => 'collection.item.entity.title'
            ])
            ->addColumn('barcode', StringType::class, [
                'label' => 'collection.item.entity.barcode'
            ])
            ->addAction('edit', [
                'label' => 'collection.grid.action_edit',
                'icon' => 'pencil',
                'route' => "item_edit",
                'route_parameters' => [
                    'id' => '{id}'
                ],
            ])
        ;
    }
}
