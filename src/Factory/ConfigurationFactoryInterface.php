<?php
namespace OmnideskBundle\Factory;

use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Interface ConfigurationFactoryInterface
 * @package OmnideskBundle\Factory
 */
interface ConfigurationFactoryInterface
{
    /**
     * @param string $type
     * @return ConfigurationInterface
     */
    public function get($type);
}
