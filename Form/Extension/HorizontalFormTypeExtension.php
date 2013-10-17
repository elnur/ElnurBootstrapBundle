<?php
namespace Elnur\Bundle\BootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HorizontalFormTypeExtension extends AbstractTypeExtension
{
    protected $columns;
    protected $layoutColumns;

    public function __construct(array $columns, $layoutColumns)
    {
        $this->columns = $columns;
        $this->layoutColumns = $layoutColumns;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'columns' => $this->columns,
                'layoutColumns' => $this->layoutColumns
            )
        );
    }

    /**
     * @param FormView      $view
     * @param FormInterface $form
     * @param array         $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_merge($view->vars, array(
            'columns' => $options['columns'],
            'layout_columns' => $options['layoutColumns']
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
