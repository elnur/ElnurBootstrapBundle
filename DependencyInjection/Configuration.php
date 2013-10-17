<?php
namespace Elnur\Bundle\BootstrapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('elnur_bootstrap');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('label_class')->defaultValue('col-lg-2')->end()
                ->arrayNode('wrapper_attr')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('class')->defaultValue('col-lg-10')->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
