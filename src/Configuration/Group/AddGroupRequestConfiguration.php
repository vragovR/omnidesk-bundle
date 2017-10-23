<?php
namespace OmnideskBundle\Configuration\Group;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class AddGroupRequestConfiguration
 * @package OmnideskBundle\Configuration\Group
 */
class AddGroupRequestConfiguration implements ConfigurationInterface
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
                ->scalarNode('group_title')
                    ->isRequired()
                ->end()
                ->scalarNode('group_from_name')
                    ->defaultNull()
                ->end()
                ->scalarNode('group_signature')
                    ->defaultNull()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
