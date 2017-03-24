<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Request\RequestInterface;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Processor;

/**
 * Class AbstractService
 * @package OmnideskBundle\Service
 */
abstract class AbstractService
{
    /**
     * @param RequestInterface         $request
     * @param DataTransformerInterface $transformer
     * @param ConfigurationInterface   $configuration
     * @return array
     */
    protected function checkRequest(
        RequestInterface $request,
        DataTransformerInterface $transformer,
        ConfigurationInterface $configuration
    ) {
        $processor = new Processor();
        $params = $transformer->transform($request);

        return $processor->processConfiguration($configuration, ['params' => array_filter($params)]);
    }
}
