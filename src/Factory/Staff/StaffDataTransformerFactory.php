<?php
namespace OmnideskBundle\Factory\Staff;

use OmnideskBundle\DataTransformer\Request\Staff\AddStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Staff\EditStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Staff\ListStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Staff\ViewStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\Staff\ListStaffResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\Staff\ViewStaffResponseDataTransformer;
use OmnideskBundle\Factory\AbstractDataTransformerFactory;

/**
 * Class StaffDataTransformerFactory
 * @package OmnideskBundle\Factory\Staff
 */
class StaffDataTransformerFactory extends AbstractDataTransformerFactory
{
    /**
     * StaffService constructor.
     * @param AddStaffRequestDataTransformer   $addRequest
     * @param EditStaffRequestDataTransformer  $editRequest
     * @param ListStaffRequestDataTransformer  $listRequest
     * @param ViewStaffRequestDataTransformer  $viewRequest
     * @param ListStaffResponseDataTransformer $listResponse
     * @param ViewStaffResponseDataTransformer $viewResponse
     */
    public function __construct(
        AddStaffRequestDataTransformer $addRequest,
        EditStaffRequestDataTransformer $editRequest,
        ListStaffRequestDataTransformer $listRequest,
        ViewStaffRequestDataTransformer $viewRequest,
        ListStaffResponseDataTransformer $listResponse,
        ViewStaffResponseDataTransformer $viewResponse
    ) {
        $this->addRequest = $addRequest;
        $this->editRequest = $editRequest;
        $this->listRequest = $listRequest;
        $this->viewRequest = $viewRequest;
        $this->viewResponse = $viewResponse;
        $this->listResponse = $listResponse;
    }
}
