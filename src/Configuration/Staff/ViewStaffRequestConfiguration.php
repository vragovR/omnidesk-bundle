<?php
namespace OmnideskBundle\Configuration\Staff;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ViewStaffRequestConfiguration
 * @package OmnideskBundle\Configuration\Staff
 */
class ViewStaffRequestConfiguration implements ConfigurationInterface
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
                ->integerNode('staff_idd')
                    ->isRequired()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
