<?php
namespace OmnideskBundle\Configuration\Group;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ViewGroupRequestConfiguration
 * @package OmnideskBundle\Configuration\Group
 */
class ViewGroupRequestConfiguration implements ConfigurationInterface
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
                ->scalarNode('group_id')
                    ->isRequired()
                ->end()
            ->end();


        return $treeBuilder;
    }
}
