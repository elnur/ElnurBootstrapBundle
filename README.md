ElnurBootstrapBundle
====================

This bundle provides unobtrusive support for Bootstrap 3. By “unobtrusive” I mean that it doesn't force some particular
styling unless you explicitly tell it to. For example, by default, forms get the default Bootstrap layout — not
horizontal or something else like that.

Installation
------------

The bundle assumes that you install Bootstrap yourself by whatever means you like — be it a Composer package or via
Bower.

To install the bundle itself, add the following to your `composer.json`:

    {
        "require": {
            "elnur/bootstrap-bundle": "~0.1@dev"
        }
    }

And tell Composer to install the bundle:

    $ php composer.phar update elnur/bootstrap-bundle

Then enable the bundle by adding the following to your `AppKernel.php`:

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Elnur\Bundle\BootstrapBundle\ElnurBootstrapBundle,
        );

        // ...
    }

Configuration
-------------

You can globally customize the default attributes for the widget wrapper div and the labels in horizontal layout by the
following options in your `config.yml`

    elnur_bootstrap:
        wrapper_attr:
            class:  'col-lg-9 col-lg-offset-1'
        label_class: 'col-lg-2'

On the label only the class is customizable as such to avoid overwriting defaults.

Forms
-----

In the form builder you can change the attributes by using the `wrapper_attr` and `label_attr` options:

    //...
    $builder->add('someFieldName', 'text', array(
        'wrapper_attr' => array(
            'class' => 'col-lg-5 col-md-6',
        ),
        'label_attr' => array(
            'class' => 'col-lg-7'
        )
    ));
    //...

Be careful, the attributes overwrite the previous ones. They do not get appended or merged to them.

To render a form with the default Bootstrap layout, just do the following:

    {{ form(form) }}

If you want to use another layout — say, horizontal — tell about that explicitly:

    {{ form(form, {layout: 'horizontal'}) }}

Supported layouts are:

* default,
* `horizontal`,
* `inline`, and
* `navbar`.

You can also change the wrapper and label atttributes in the template:

    {{ form(form, {layout: 'horizontal', wrapper_attr: {class: 'col-lg-5 col-sm-6'}, label_attr: {class: 'col-lg-5 col-lg-offset-1 }) }}

Be careful, the attributes overwrite the previous ones. They do not get appended or merged to them.

Flash Messages
--------------

To render flash messages just add the following to your layout template:

    {% include 'ElnurBootstrapBundle::flash.html.twig' %}
