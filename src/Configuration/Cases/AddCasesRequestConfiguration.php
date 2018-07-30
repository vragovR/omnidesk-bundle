<?php
namespace OmnideskBundle\Configuration\Cases;

use OmnideskBundle\Model\Cases;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class AddCasesRequestConfiguration
 * @package OmnideskBundle\Configuration\Cases
 */
class AddCasesRequestConfiguration implements ConfigurationInterface
{
    /**
     * @var string
     */
    const MESSAGE_INVALID_PRIORITY = 'Invalid priority. Allowed priorities are: %s';

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
                    ->prototype('scalar')
                    ->end()
                ->end()
                ->arrayNode('labels')
                ->end()
                ->arrayNode('attachments')
                    ->prototype('scalar')
                    ->end()
                ->end()
                ->scalarNode('priority')
                    ->defaultNull()
                    ->validate()
                        ->ifNotInArray(Cases::PRIORITIES)
                        ->thenInvalid(sprintf(self::MESSAGE_INVALID_PRIORITY, implode(', ', Cases::PRIORITIES)))
                    ->end()
                ->end()
                ->scalarNode('staff_id')
                    ->defaultNull()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
