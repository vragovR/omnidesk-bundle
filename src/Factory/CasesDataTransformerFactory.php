<?php
namespace OmnideskBundle\Factory;

use OmnideskBundle\DataTransformer\Request\AddCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\EditCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\ListCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\ViewCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\ListCasesResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\ViewCasesResponseDataTransformer;
use OmnideskBundle\Exception\BadDataTransformerFactoryException;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class CasesDataTransformerFactory
 * @package OmnideskBundle\Factory
 */
class CasesDataTransformerFactory
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
     * @var AddCasesRequestDataTransformer
     */
    protected $addRequest;

    /**
     * @var EditCasesRequestDataTransformer
     */
    protected $editRequest;

    /**
     * @var ListCasesRequestDataTransformer
     */
    protected $listRequest;

    /**
     * @var ViewCasesRequestDataTransformer
     */
    protected $viewRequest;

    /**
     * @var ListCasesResponseDataTransformer
     */
    protected $listResponse;

    /**
     * @var ViewCasesResponseDataTransformer
     */
    protected $viewResponse;

    /**
     * CasesService constructor.
     * @param AddCasesRequestDataTransformer   $addRequest
     * @param EditCasesRequestDataTransformer  $editRequest
     * @param ListCasesRequestDataTransformer  $listRequest
     * @param ViewCasesRequestDataTransformer  $viewRequest
     * @param ListCasesResponseDataTransformer $listResponse
     * @param ViewCasesResponseDataTransformer $viewResponse
     */
    public function __construct(
        AddCasesRequestDataTransformer $addRequest,
        EditCasesRequestDataTransformer $editRequest,
        ListCasesRequestDataTransformer $listRequest,
        ViewCasesRequestDataTransformer $viewRequest,
        ListCasesResponseDataTransformer $listResponse,
        ViewCasesResponseDataTransformer $viewResponse
    ) {
        $this->addRequest = $addRequest;
        $this->editRequest = $editRequest;
        $this->listRequest = $listRequest;
        $this->viewRequest = $viewRequest;
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
