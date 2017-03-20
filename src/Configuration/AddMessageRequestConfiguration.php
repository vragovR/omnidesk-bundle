<?php
namespace OmnideskBundle\Configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ListMessageRequestConfiguration
 * @package OmnideskBundle\Configuration
 */
class AddMessageRequestConfiguration implements ConfigurationInterface
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
                ->scalarNode('content')
                    ->isRequired()
                ->end()
                ->scalarNode('content_html')
                    ->isRequired()
                ->end()
                ->integerNode('staff_id')
                    ->defaultNull()
                ->end()
                ->integerNode('user_id')
                    ->defaultNull()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
