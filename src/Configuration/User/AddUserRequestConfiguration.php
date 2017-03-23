<?php
namespace OmnideskBundle\Configuration\User;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class AddUserRequestConfiguration
 * @package OmnideskBundle\Configuration\User
 */
class AddUserRequestConfiguration implements ConfigurationInterface
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
                ->end()
            ->end();

        return $treeBuilder;
    }
}
