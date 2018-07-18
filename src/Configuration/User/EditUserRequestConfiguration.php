<?php
namespace OmnideskBundle\Configuration\User;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class EditUserRequestConfiguration
 * @package OmnideskBundle\Configuration\User
 */
class EditUserRequestConfiguration implements ConfigurationInterface
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
                ->integerNode('user_id')
                    ->isRequired()
                ->end()
                ->scalarNode('user_email')
                    ->defaultNull()
                ->end()
                ->scalarNode('user_full_name')
                    ->defaultNull()
                ->end()
                ->scalarNode('company_name')
                    ->defaultNull()
                ->end()
                ->scalarNode('company_position')
                    ->defaultNull()
                ->end()
                ->scalarNode('user_note')
                    ->defaultNull()
                ->end()
                ->scalarNode('language_id')
                    ->defaultNull()
                ->end()
                ->arrayNode('custom_fields')
                    ->prototype('scalar')
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
