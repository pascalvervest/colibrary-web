<?php

namespace CoLibraryBundle\Grid\Type;

use Prezent\Grid\BaseElementTypeExtension;
use Prezent\Grid\ElementView;
use Prezent\Grid\Extension\Core\Type\ActionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Icon extension
 * Class IconTypeExtension
 * @package CoLibraryBundle\Grid\Type
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class IconTypeExtension extends BaseElementTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined('icon');
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(ElementView $view, array $options)
    {
        if (isset($options['icon'])) {
            $view->vars['icon'] = sprintf('fa fa-%s', $options['icon']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return ActionType::class;
    }
}
