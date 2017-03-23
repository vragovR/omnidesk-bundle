<?php
namespace OmnideskBundle\Configuration\Cases;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class ViewCasesRequestConfiguration
 * @package OmnideskBundle\Configuration\Cases
 */
class ViewCasesRequestConfiguration implements ConfigurationInterface
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
                ->integerNode('case_id')
                    ->isRequired()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
