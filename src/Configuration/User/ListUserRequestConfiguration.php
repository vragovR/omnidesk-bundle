<?php
namespace OmnideskBundle\Configuration\User;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ListUserRequestConfiguration
 * @package OmnideskBundle\Configuration\User
 */
class ListUserRequestConfiguration implements ConfigurationInterface
{
    /**
     * @var int
     */
    const DEFAULT_PAGE = 1;

    /**
     * @var int
     */
    const DEFAULT_LIMIT = 100;

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
                    ->defaultValue(self::DEFAULT_PAGE)
                ->end()
                ->integerNode('limit')
                    ->defaultValue(self::DEFAULT_LIMIT)
                ->end()
                ->scalarNode('user_email')
                    ->defaultNull()
                ->end()
                ->scalarNode('user_phone')
                    ->defaultNull()
                ->end()
                ->integerNode('language_id')
                    ->defaultNull()
                ->end()
                ->arrayNode('custom_fields')
                ->end()
                ->booleanNode('amount_of_cases')
                    ->defaultFalse()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
