<?php
namespace OmnideskBundle\Configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class GetCasesRequestConfiguration
 * @package OmnideskBundle\Configuration
 */
class CreateCasesRequestConfiguration implements ConfigurationInterface
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
                ->scalarNode('user_email')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('user_phone')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('user_full_name')
                    ->defaultNull()
                ->end()
                ->scalarNode('subject')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('content')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('content_html')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('group_id')
                    ->defaultNull()
                ->end()
                ->scalarNode('language_id')
                    ->defaultNull()
                ->end()
                ->arrayNode('custom_fields')
                ->end()
                ->arrayNode('labels')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
