<?php
namespace OmnideskBundle\Factory;

use OmnideskBundle\Exception\BadDataTransformerFactoryException;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class AbstractDataTransformerFactory
 * @package OmnideskBundle\Factory
 */
abstract class AbstractDataTransformerFactory implements DataTransformerFactoryInterface
{
    /**
     * @var string
     */
    const REQUEST_ADD = 'request-add';

    /**
     * @var string
     */
    const REQUEST_EDIT = 'request-edit';

    /**
     * @var string
     */
    const REQUEST_VIEW = 'request-view';

    /**
     * @var string
     */
    const REQUEST_LIST = 'request-list';

    /**
     * @var string
     */
    const RESPONSE_LIST = 'response-list';

    /**
     * @var string
     */
    const RESPONSE_VIEW = 'response-view';

    /**
     * @var DataTransformerInterface
     */
    protected $addRequest;

    /**
     * @var DataTransformerInterface
     */
    protected $editRequest;

    /**
     * @var DataTransformerInterface
     */
    protected $listRequest;

    /**
     * @var DataTransformerInterface
     */
    protected $viewRequest;

    /**
     * @var DataTransformerInterface
     */
    protected $listResponse;

    /**
     * @var DataTransformerInterface
     */
    protected $viewResponse;

    /**
     * @param string $type
     * @return DataTransformerInterface
     * @throws BadDataTransformerFactoryException
     */
    public function get($type)
    {
        switch ($type) {
            case self::REQUEST_ADD:
                return $this->addRequest;
            case self::REQUEST_EDIT:
                return $this->editRequest;
            case self::REQUEST_LIST:
                return $this->listRequest;
            case self::REQUEST_VIEW:
                return $this->viewRequest;
            case self::RESPONSE_LIST:
                return $this->listResponse;
            case self::RESPONSE_VIEW:
                return $this->viewResponse;
            default:
                throw new BadDataTransformerFactoryException();
        }
    }
}
