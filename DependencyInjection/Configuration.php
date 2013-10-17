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
                ->arrayNode('columns')
                ->addDefaultsIfNotSet()
                ->children()
                    ->integerNode('lg')
                        ->defaultValue(10)
                        ->min(1)
                        ->max(11)
                    ->end()
                    ->integerNode('md')
                        ->min(1)
                        ->max(11)
                    ->end()
                    ->integerNode('sm')
                        ->min(1)
                        ->max(11)
                    ->end()
                    ->integerNode('xs')
                        ->min(1)
                        ->max(11)
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
