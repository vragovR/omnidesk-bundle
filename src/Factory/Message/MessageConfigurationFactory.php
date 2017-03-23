<?php
namespace OmnideskBundle\Factory\Message;

use OmnideskBundle\Configuration\Message\AddMessageRequestConfiguration;
use OmnideskBundle\Configuration\Message\ListMessageRequestConfiguration;
use OmnideskBundle\Exception\BadConfigurationFactoryException;
use OmnideskBundle\Factory\AbstractConfigurationFactory;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class MessageConfigurationFactory
 * @package OmnideskBundle\Factory\Message
 */
class MessageConfigurationFactory extends AbstractConfigurationFactory
{
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
