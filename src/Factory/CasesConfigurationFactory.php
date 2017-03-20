<?php
namespace OmnideskBundle\Factory;

use OmnideskBundle\Configuration\AddCasesRequestConfiguration;
use OmnideskBundle\Configuration\EditCasesRequestConfiguration;
use OmnideskBundle\Configuration\ListCasesRequestConfiguration;
use OmnideskBundle\Configuration\ViewCasesRequestConfiguration;
use OmnideskBundle\Exception\BadConfigurationFactoryException;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class CasesConfigurationFactory
 * @package OmnideskBundle\Factory
 */
class CasesConfigurationFactory
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
     * @var AddCasesRequestConfiguration
     */
    protected $addConfiguration;

    /**
     * @var EditCasesRequestConfiguration
     */
    protected $editConfiguration;

    /**
     * @var ListCasesRequestConfiguration
     */
    protected $listConfiguration;

    /**
     * @var ViewCasesRequestConfiguration
     */
    protected $viewConfiguration;

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
