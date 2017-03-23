<?php
namespace OmnideskBundle\Factory\User;

use OmnideskBundle\Configuration\User\AddUserRequestConfiguration;
use OmnideskBundle\Configuration\User\EditUserRequestConfiguration;
use OmnideskBundle\Configuration\User\ListUserRequestConfiguration;
use OmnideskBundle\Configuration\User\ViewUserRequestConfiguration;
use OmnideskBundle\Exception\BadConfigurationFactoryException;
use OmnideskBundle\Factory\AbstractConfigurationFactory;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class UserConfigurationFactory
 * @package OmnideskBundle\Factory\User
 */
class UserConfigurationFactory extends AbstractConfigurationFactory
{
    /**
     * UserConfigurationFactory constructor.
     * @param AddUserRequestConfiguration  $addConfiguration
     * @param EditUserRequestConfiguration $editConfiguration
     * @param ListUserRequestConfiguration $listConfiguration
     * @param ViewUserRequestConfiguration $viewConfiguration
     */
    public function __construct(
        AddUserRequestConfiguration $addConfiguration,
        EditUserRequestConfiguration $editConfiguration,
        ListUserRequestConfiguration $listConfiguration,
        ViewUserRequestConfiguration $viewConfiguration
    ) {
        $this->addConfiguration = $addConfiguration;
        $this->editConfiguration = $editConfiguration;
        $this->listConfiguration = $listConfiguration;
        $this->viewConfiguration = $viewConfiguration;
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
            case self::CONFIGURATION_EDIT:
                return $this->editConfiguration;
            case self::CONFIGURATION_LIST:
                return $this->listConfiguration;
            case self::CONFIGURATION_VIEW:
                return $this->viewConfiguration;
            default:
                throw new BadConfigurationFactoryException();
        }
    }
}
