<?php
namespace OmnideskBundle\Factory;

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Interface DataTransformerFactoryInterface
 * @package OmnideskBundle\Factory
 */
interface DataTransformerFactoryInterface
{
    /**
     * @param string $type
     * @return DataTransformerInterface
     */
    public function get($type);
}
