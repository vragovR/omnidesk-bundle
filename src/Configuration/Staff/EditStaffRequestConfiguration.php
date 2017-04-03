<?php
namespace OmnideskBundle\Configuration\Staff;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class EditStaffRequestConfiguration
 * @package OmnideskBundle\Configuration\Staff
 */
class EditStaffRequestConfiguration implements ConfigurationInterface
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
                ->integerNode('staff_id')
                    ->isRequired()
                ->end()
                ->scalarNode('staff_email')
                    ->defaultNull()
                ->end()
                ->scalarNode('staff_full_name')
                    ->defaultNull()
                ->end()
                ->scalarNode('staff_signature')
                    ->defaultNull()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
