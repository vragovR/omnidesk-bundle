<?php
namespace OmnideskBundle\Configuration;

use OmnideskBundle\Request\Message\GetMessagesRequest;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class GetMessagesRequestConfiguration
 * @package OmnideskBundle\Configuration
 */
class GetMessagesRequestConfiguration implements ConfigurationInterface
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
     * @var string
     */
    const MESSAGE_ORDER_INVALID_TYPE = 'Order invalid type.';

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
                ->integerNode('page')
                    ->defaultValue(self::DEFAULT_PAGE)
                ->end()
                ->integerNode('limit')
                    ->defaultValue(self::DEFAULT_LIMIT)
                ->end()
                ->scalarNode('order')
                    ->validate()
                        ->ifNotInArray([
                            null,
                            GetMessagesRequest::ORDER_ASC,
                            GetMessagesRequest::ORDER_DESC,
                        ])
                        ->thenInvalid(self::MESSAGE_ORDER_INVALID_TYPE)
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
