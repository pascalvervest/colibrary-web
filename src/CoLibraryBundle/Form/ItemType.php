<?php

namespace CoLibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
                'label' => 'collection.entity.artist'
            ])
            ->add('title', TextType::class, [
                'label' => 'collection.entity.title'
            ])
            ->add('barcode', TextType::class, [
                'label' => 'collection.entity.barcode'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'collection.form.btn_save',
                'attr' => [
                    'class' => 'button'
                ]
            ]);
    }
}
