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
class CollectionGridType extends BaseGridType
{
    public function buildGrid(GridBuilder $builder, array $options = [])
    {
        $builder
            ->addColumn('id', StringType::class, [
                'label' => 'collection.grid.id'
            ])
            ->addColumn('artist', StringType::class, [
                'label' => 'collection.grid.artist'
            ])
            ->addColumn('title', StringType::class, [
                'label' => 'collection.grid.title'
            ])
            ->addColumn('barcode', StringType::class, [
                'label' => 'collection.grid.barcode'
            ])
        ;
    }
}
