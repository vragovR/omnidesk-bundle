<?php
namespace OmnideskBundle\Configuration\Group;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ListGroupRequestConfiguration
 * @package OmnideskBundle\Configuration\Group
 */
class ListGroupRequestConfiguration implements ConfigurationInterface
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
                ->integerNode('page')
                    ->defaultValue(1)
                    ->min(1)
                ->end()
                ->integerNode('limit')
                    ->defaultValue(100)
                    ->min(1)
                    ->max(100)
                ->end()
            ->end();


        return $treeBuilder;
    }
}
