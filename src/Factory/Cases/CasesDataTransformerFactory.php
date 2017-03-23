<?php
namespace OmnideskBundle\Factory\Cases;

use OmnideskBundle\DataTransformer\Request\Cases\AddCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Cases\EditCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Cases\ListCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Cases\ViewCasesRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\Cases\ListCasesResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\Cases\ViewCasesResponseDataTransformer;
use OmnideskBundle\Factory\AbstractDataTransformerFactory;

/**
 * Class CasesDataTransformerFactory
 * @package OmnideskBundle\Factory\Cases
 */
class CasesDataTransformerFactory extends AbstractDataTransformerFactory
{
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
}
