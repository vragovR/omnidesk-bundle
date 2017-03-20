<?php
namespace OmnideskBundle\Factory;

use OmnideskBundle\DataTransformer\Request\AddMessageRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\ListMessageRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\ListMessageResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\ViewMessageResponseDataTransformer;
use OmnideskBundle\Exception\BadDataTransformerFactoryException;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class MessageDataTransformerFactory
 * @package OmnideskBundle\Factory
 */
class MessageDataTransformerFactory
{
    /**
     * @var string
     */
    const REQUEST_ADD = 'request-add';

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
     * @var AddMessageRequestDataTransformer
     */
    protected $addRequest;

    /**
     * @var ListMessageRequestDataTransformer
     */
    protected $listRequest;

    /**
     * @var ListMessageResponseDataTransformer
     */
    protected $listResponse;

    /**
     * @var ViewMessageResponseDataTransformer
     */
    protected $viewResponse;

    /**
     * CasesService constructor.
     * @param AddMessageRequestDataTransformer   $addRequest
     * @param ListMessageRequestDataTransformer  $listRequest
     * @param ListMessageResponseDataTransformer $listResponse
     * @param ViewMessageResponseDataTransformer $viewResponse
     */
    public function __construct(
        AddMessageRequestDataTransformer $addRequest,
        ListMessageRequestDataTransformer $listRequest,
        ListMessageResponseDataTransformer $listResponse,
        ViewMessageResponseDataTransformer $viewResponse
    ) {
        $this->addRequest = $addRequest;
        $this->listRequest = $listRequest;
        $this->viewResponse = $viewResponse;
        $this->listResponse = $listResponse;
    }

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
            case self::REQUEST_LIST:
                return $this->listRequest;
            case self::RESPONSE_LIST:
                return $this->listResponse;
            case self::RESPONSE_VIEW:
                return $this->viewResponse;
            default:
                throw new BadDataTransformerFactoryException();
        }
    }
}
