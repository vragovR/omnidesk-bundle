<?php
namespace OmnideskBundle\Configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class CreateCasesConfiguration
 * @package OmnideskBundle\Configuration\Request
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
