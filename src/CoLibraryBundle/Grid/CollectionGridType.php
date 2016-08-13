<?php

namespace CoLibraryBundle\Grid;

use Prezent\Grid\BaseGridType;
use Prezent\Grid\Extension\Core\Type\StringType;
use Prezent\Grid\GridBuilder;
use Prezent\Grid\GridView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CollectionGridType
 *
 * @package CoLibraryBundle\Grid
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class CollectionGridType extends BaseGridType
{
    /**
     * {@inheritdoc}
     */
    public function buildGrid(GridBuilder $builder, array $options = [])
    {
        $builder
            ->addColumn('id', StringType::class, [
                'label' => 'collection.entity.id',
            ])
            ->addColumn('name', StringType::class, [
                'label' => 'collection.entity.name'
            ])
            ->addAction('view', [
                'label' => 'collection.grid.action_view',
                'icon' => 'eye',
                'route' => 'collection_view',
                'route_parameters' => [
                    'id' => '{id}'
                ]
            ])
            ->addAction('edit', [
                'label' => 'collection.grid.action_edit',
                'icon' => 'pencil',
                'route' => "collection_edit",
                'route_parameters' => [
                    'id' => '{id}'
                ],
            ])
        ;
    }
}
