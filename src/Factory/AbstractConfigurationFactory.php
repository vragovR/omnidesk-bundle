<?php
namespace OmnideskBundle\Factory;

use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class AbstractConfigurationFactory
 * @package OmnideskBundle\Factory
 */
abstract class AbstractConfigurationFactory implements ConfigurationFactoryInterface
{
    /**
     * @var string
     */
    const CONFIGURATION_ADD = 'add';

    /**
     * @var string
     */
    const CONFIGURATION_EDIT = 'edit';

    /**
     * @var string
     */
    const CONFIGURATION_LIST = 'list';

    /**
     * @var string
     */
    const CONFIGURATION_VIEW = 'view';

    /**
     * @var ConfigurationInterface
     */
    protected $addConfiguration;

    /**
     * @var ConfigurationInterface
     */
    protected $editConfiguration;

    /**
     * @var ConfigurationInterface
     */
    protected $listConfiguration;

    /**
     * @var ConfigurationInterface
     */
    protected $viewConfiguration;
}
