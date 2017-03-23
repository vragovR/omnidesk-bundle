<?php
namespace OmnideskBundle\Configuration\Staff;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ListStaffRequestConfiguration
 * @package OmnideskBundle\Configuration\Staff
 */
class ListStaffRequestConfiguration implements ConfigurationInterface
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
                    ->min(1)
                    ->max(100)
                ->end()
            ->end();

        return $treeBuilder;
    }
}
