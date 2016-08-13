<?php

namespace CoLibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Class ItemType
 * @package CoLibraryBundle\Form
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class ItemType extends AbstractType
{
    /**
     * {@inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artist', TextType::class, [
                'label' => 'collection.item.entity.artist'
            ])
            ->add('title', TextType::class, [
                'label' => 'collection.item.entity.title'
            ])
            ->add('barcode', TextType::class, [
                'label' => 'collection.item.entity.barcode'
            ])
            ->add('collection', EntityType::class, [
                'class' => 'CoLibraryBundle:Collection',
                'choice_label' => 'name'

            ])

            ->add('save', SubmitType::class, [
                'label' => 'collection.item.button.btn_save',
                'attr' => [
                    'class' => 'button'
                ]
            ]);
    }
}
