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

Input groups
------------

To prepend or append textual addons to an input, use the `prepend` and `append` options, respectively:

    $builder->add('price', 'integer', array(
        'prepend' => '$',
        'append' => '.00',
    ));

Converting Labels to Placeholders
---------------------------------

If you want to convert labels to placeholders, set the `labels_to_placeholders` option to `true`:

    {{ form(form, {labels_to_placeholders: true}) }}

Flash Messages
--------------

To render flash messages just add the following to your layout template:

    {% include 'ElnurBootstrapBundle::flash.html.twig' %}
