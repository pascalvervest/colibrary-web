<?php

namespace CoLibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Item form
 * 
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artist')
            ->add('title')
            ->add('barcode')
            ->add('save', SubmitType::class);
    }
}