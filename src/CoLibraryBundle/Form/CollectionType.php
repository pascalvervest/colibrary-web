<?php

namespace CoLibraryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class CollectionType
 *
 * @package CoLibraryBundle\Form
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class CollectionType extends AbstractType
{
    /**
     * {@inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'collection.entity.name'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'collection.form.btn_save',
                'attr' => [
                    'class' => 'button'
                ]
            ]);
    }
}
