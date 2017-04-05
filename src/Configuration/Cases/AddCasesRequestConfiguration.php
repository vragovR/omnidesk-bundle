<?php
namespace OmnideskBundle\Configuration\Cases;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class AddCasesRequestConfiguration
 * @package OmnideskBundle\Configuration\Cases
 */
class AddCasesRequestConfiguration implements ConfigurationInterface
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
                    ->defaultNull()
                ->end()
                ->scalarNode('user_phone')
                    ->defaultNull()
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
                ->arrayNode('case')
                    ->children()
                        ->arrayNode('attachments')
                            ->prototype('scalar')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
