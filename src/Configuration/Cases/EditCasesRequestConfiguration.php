<?php
namespace OmnideskBundle\Configuration\Cases;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class EditCasesRequestConfiguration
 * @package OmnideskBundle\Configuration\Cases
 */
class EditCasesRequestConfiguration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('params');

        $rootNode
            ->children()
                ->integerNode('case_id')
                    ->isRequired()
                ->end()
                ->scalarNode('subject')
                    ->defaultNull()
                ->end()
                ->integerNode('group_id')
                    ->defaultNull()
                ->end()
                ->integerNode('staff_id')
                    ->defaultNull()
                ->end()
                ->scalarNode('status')
                    ->defaultNull()
                ->end()
                ->scalarNode('priority')
                    ->defaultNull()
                ->end()
                ->integerNode('language_id')
                    ->defaultNull()
                ->end()
                ->arrayNode('custom_fields')
                    ->prototype('scalar')
                    ->end()
                ->end()
                ->arrayNode('add_labels')
                ->end()
                ->arrayNode('delete_labels')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
