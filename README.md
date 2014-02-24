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

Forms
-----

To render a form with the default Bootstrap layout, just do the following:

    {{ form(form) }}

If you want to use another layout — say, horizontal — tell about that explicitly:

    {{ form(form, {layout: 'horizontal'}) }}

Supported layouts are:

* default,
* `horizontal`,
* `inline`, and
* `navbar`.

Buttons
-------

### Context

To set a button's context, use the `context` option:

    $builder->add('submit', 'submit', array(
        'context' => 'primary',
    ));

Bootstrap ships with the following contexts:

* `default`,
* `primary`,
* `success`,
* `info`,
* `warning`,
* `danger`, and
* `link`.

Flash Messages
--------------

To render flash messages just add the following to your layout template:

    {% include 'ElnurBootstrapBundle::flash.html.twig' %}
