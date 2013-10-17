<?php
namespace Elnur\Bundle\BootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HorizontalFormTypeExtension extends AbstractTypeExtension
{
    protected $wrapperSize;

    public function __construct(array $wrapperSize)
    {
        $this->wrapperSize = $wrapperSize;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('wrapper_size' => $this->wrapperSize));
    }

    /**
     * @param FormView      $view
     * @param FormInterface $form
     * @param array         $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_merge($view->vars, array(
            'wrapper_class' => $this->processWrapperSize($options['wrapper_size']),
        ));
    }

    /**
     * @return string
     */
    public function getExtendedType()
    {
        return 'form';
    }

    /**
     * @param array $wrapperSize
     *
     * @return array
     */
    protected function processWrapperSize(array $wrapperSize)
    {
        $widgetClass = array();
        $labelClass = array();

        foreach ($wrapperSize as $size => $value) {
            $widgetClass[] = 'col-' . $size . '-' . $value;
            $labelClass[] = 'col-' . $size . '-' . (12-$value);
        }

        return array(
            'widget' => implode(' ', $widgetClass),
            'label'  => implode(' ', $labelClass)
        );
    }
}
