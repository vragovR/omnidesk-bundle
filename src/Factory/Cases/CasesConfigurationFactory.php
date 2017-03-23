<?php
namespace OmnideskBundle\Factory\Cases;

use OmnideskBundle\Configuration\Cases\AddCasesRequestConfiguration;
use OmnideskBundle\Configuration\Cases\EditCasesRequestConfiguration;
use OmnideskBundle\Configuration\Cases\ListCasesRequestConfiguration;
use OmnideskBundle\Configuration\Cases\ViewCasesRequestConfiguration;
use OmnideskBundle\Exception\BadConfigurationFactoryException;
use OmnideskBundle\Factory\AbstractConfigurationFactory;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class CasesConfigurationFactory
 * @package OmnideskBundle\Factory\Cases
 */
class CasesConfigurationFactory extends AbstractConfigurationFactory
{
    /**
     * CasesConfigurationFactory constructor.
     * @param AddCasesRequestConfiguration  $addConfiguration
     * @param EditCasesRequestConfiguration $editConfiguration
     * @param ListCasesRequestConfiguration $listConfiguration
     * @param ViewCasesRequestConfiguration $viewConfiguration
     */
    public function __construct(
        AddCasesRequestConfiguration $addConfiguration,
        EditCasesRequestConfiguration $editConfiguration,
        ListCasesRequestConfiguration $listConfiguration,
        ViewCasesRequestConfiguration $viewConfiguration
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
