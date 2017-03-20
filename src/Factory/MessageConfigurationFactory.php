<?php
namespace OmnideskBundle\Factory;

use OmnideskBundle\Configuration\AddMessageRequestConfiguration;
use OmnideskBundle\Configuration\ListMessageRequestConfiguration;
use OmnideskBundle\Exception\BadConfigurationFactoryException;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class MessageConfigurationFactory
 * @package OmnideskBundle\Factory
 */
class MessageConfigurationFactory
{
    /**
     * @var string
     */
    const CONFIGURATION_ADD = 'add';

    /**
     * @var string
     */
    const CONFIGURATION_LIST = 'list';

    /**
     * @var AddMessageRequestConfiguration
     */
    protected $addConfiguration;

    /**
     * @var ListMessageRequestConfiguration
     */
    protected $listConfiguration;

    /**
     * MessageConfigurationFactory constructor.
     * @param AddMessageRequestConfiguration  $addConfiguration
     * @param ListMessageRequestConfiguration $listConfiguration
     */
    public function __construct(
        AddMessageRequestConfiguration $addConfiguration,
        ListMessageRequestConfiguration $listConfiguration
    ) {
        $this->addConfiguration = $addConfiguration;
        $this->listConfiguration = $listConfiguration;
    }

    /**
     * @param string $type
     * @return ConfigurationInterface
     * @throws BadConfigurationFactoryException
     */
    public function get($type)
    {
        switch ($type) {
            case self::CONFIGURATION_ADD:
                return $this->addConfiguration;
            case self::CONFIGURATION_LIST:
                return $this->listConfiguration;
            default:
                throw new BadConfigurationFactoryException();
        }
    }
}
