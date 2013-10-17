<?php
namespace Elnur\Bundle\BootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HorizontalFormTypeExtension extends AbstractTypeExtension
{
    protected $wrapperAttr;
    protected $defaultLabelClass;

    public function __construct(array $wrapperAttr, $defaultLabelClass)
    {
        $this->wrapperAttr = $wrapperAttr;
        $this->defaultLabelClass = $defaultLabelClass;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $defaults = array(
            'wrapper_attr' => $this->wrapperAttr,
        );
        $resolver->setDefaults($defaults);
    }

    /**
     * @param FormView      $view
     * @param FormInterface $form
     * @param array         $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_merge($view->vars, array(
            'wrapper_attr' => $options['wrapper_attr'],
            'default_label_class' => $this->defaultLabelClass
        ));

    }

    /**
     * @return string
     */
    public function getExtendedType()
    {
        return 'form';
    }
}
