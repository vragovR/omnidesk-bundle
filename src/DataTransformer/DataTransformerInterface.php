<?php
namespace OmnideskBundle\DataTransformer;

/**
 * Interface DataTransformerInterface
 * @package OmnideskBundle\DataTransformer
 */
interface DataTransformerInterface
{
    /**
     * @param mixed $value
     * @return mixed
     */
    public function transform($value);

    /**
     * @param mixed $value
     * @return mixed
     */
    public function reverseTransform($value);
}
