<?php
namespace OmnideskBundle\Configuration\Cases;

use OmnideskBundle\Entity\Cases;
use OmnideskBundle\Request\Cases\ListCasesRequest;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ListCasesRequestConfiguration
 * @package OmnideskBundle\Configuration\Cases
 */
class ListCasesRequestConfiguration implements ConfigurationInterface
{
    /**
     * @var string
     */
    const MESSAGE_CHANNEL_INVALID_TYPE = 'Chanel invalid type.';

    /**
     * @var string
     */
    const MESSAGE_PRIORITY_INVALID_TYPE = 'Priority invalid type.';

    /**
     * @var string
     */
    const MESSAGE_STATUS_INVALID_TYPE = 'Status invalid type.';

    /**
     * @var string
     */
    const MESSAGE_SORT_INVALID_TYPE = 'Sort invalid type.';

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('params');

        $rootNode
            ->children()
                ->scalarNode('page')
                    ->defaultNull()
                ->end()
                ->scalarNode('limit')
                    ->defaultNull()
                ->end()
                ->scalarNode('user_id')
                    ->defaultNull()
                ->end()
                ->scalarNode('user_email')
                    ->defaultNull()
                ->end()
                ->scalarNode('user_phone')
                    ->defaultNull()
                ->end()
                ->scalarNode('subject')
                    ->defaultNull()
                ->end()
                ->scalarNode('staff_id')
                    ->defaultNull()
                ->end()
                ->scalarNode('group_id')
                    ->defaultNull()
                ->end()
                ->scalarNode('channel')
                    ->defaultNull()
                    ->validate()
                        ->ifNotInArray([
                            null,
                            Cases::CHANNEL_CHAT,
                            Cases::CHANNEL_EMAIL,
                            Cases::CHANNEL_FACEBOOK,
                            Cases::CHANNEL_IDEA,
                            Cases::CHANNEL_TWITTER,
                        ])
                        ->thenInvalid(self::MESSAGE_CHANNEL_INVALID_TYPE)
                    ->end()
                ->end()
                ->scalarNode('priority')
                    ->validate()
                        ->ifNotInArray([
                            null,
                            Cases::PRIORITY_LOW,
                            Cases::PRIORITY_NORMAL,
                            Cases::PRIORITY_HIGH,
                            Cases::PRIORITY_CRITICAL,
                        ])
                        ->thenInvalid(self::MESSAGE_PRIORITY_INVALID_TYPE)
                    ->end()
                ->end()
                ->scalarNode('status')
                    ->validate()
                        ->ifNotInArray([
                            null,
                            Cases::STATUS_OPEN,
                            Cases::STATUS_WAITING,
                            Cases::STATUS_CLOSED,
                        ])
                        ->thenInvalid(self::MESSAGE_STATUS_INVALID_TYPE)
                    ->end()
                ->end()
                ->arrayNode('custom_fields')
                ->end()
                ->arrayNode('labels')
                ->end()
                ->scalarNode('sort')
                    ->validate()
                        ->ifNotInArray([
                            null,
                            ListCasesRequest::SORT_CREATED_AT_ASC,
                            ListCasesRequest::SORT_CREATED_AT_DESC,
                            ListCasesRequest::SORT_UPDATED_AT_ASC,
                            ListCasesRequest::SORT_UPDATED_AT_DESC,
                        ])
                        ->thenInvalid(self::MESSAGE_SORT_INVALID_TYPE)
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
