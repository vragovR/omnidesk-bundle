<?php
namespace OmnideskBundle\Factory\Group;

use OmnideskBundle\Configuration\Group\AddGroupRequestConfiguration;
use OmnideskBundle\Configuration\Group\EditGroupRequestConfiguration;
use OmnideskBundle\Configuration\Group\ListGroupRequestConfiguration;
use OmnideskBundle\Configuration\Group\ViewGroupRequestConfiguration;
use OmnideskBundle\Exception\BadConfigurationFactoryException;
use OmnideskBundle\Factory\AbstractConfigurationFactory;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class GroupConfigurationFactory
 * @package OmnideskBundle\Factory\Group
 */
class GroupConfigurationFactory extends AbstractConfigurationFactory
{
    /**
     * GroupConfigurationFactory constructor.
     * @param AddGroupRequestConfiguration  $addConfiguration
     * @param EditGroupRequestConfiguration $editConfiguration
     * @param ListGroupRequestConfiguration $listConfiguration
     * @param ViewGroupRequestConfiguration $viewConfiguration
     */
    public function __construct(
        AddGroupRequestConfiguration $addConfiguration,
        EditGroupRequestConfiguration $editConfiguration,
        ListGroupRequestConfiguration $listConfiguration,
        ViewGroupRequestConfiguration $viewConfiguration
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
        }

        throw new BadConfigurationFactoryException();
    }
}
