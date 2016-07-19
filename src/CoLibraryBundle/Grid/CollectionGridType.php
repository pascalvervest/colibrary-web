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
            ->addColumn('id', StringType::class)
            ->addColumn('artist', StringType::class)
            ->addColumn('title', StringType::class)
            ->addColumn('barcode', StringType::class)
        ;
    }
}
