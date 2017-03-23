<?php
namespace OmnideskBundle\Factory\Staff;

use OmnideskBundle\Configuration\Staff\AddStaffRequestConfiguration;
use OmnideskBundle\Configuration\Staff\EditStaffRequestConfiguration;
use OmnideskBundle\Configuration\Staff\ListStaffRequestConfiguration;
use OmnideskBundle\Configuration\Staff\ViewStaffRequestConfiguration;
use OmnideskBundle\Exception\BadConfigurationFactoryException;
use OmnideskBundle\Factory\AbstractConfigurationFactory;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class StaffConfigurationFactory
 * @package OmnideskBundle\Factory\Staff
 */
class StaffConfigurationFactory extends AbstractConfigurationFactory
{
    /**
     * StaffConfigurationFactory constructor.
     * @param AddStaffRequestConfiguration  $addConfiguration
     * @param EditStaffRequestConfiguration $editConfiguration
     * @param ListStaffRequestConfiguration $listConfiguration
     * @param ViewStaffRequestConfiguration $viewConfiguration
     */
    public function __construct(
        AddStaffRequestConfiguration $addConfiguration,
        EditStaffRequestConfiguration $editConfiguration,
        ListStaffRequestConfiguration $listConfiguration,
        ViewStaffRequestConfiguration $viewConfiguration
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
