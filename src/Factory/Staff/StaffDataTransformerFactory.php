<?php
namespace OmnideskBundle\Factory\Staff;

use OmnideskBundle\DataTransformer\Request\Staff\AddStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Staff\EditStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Staff\ListStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Staff\ViewStaffRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\Staff\ListStaffResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\Staff\ViewStaffResponseDataTransformer;

/**
 * Class StaffDataTransformerFactory
 * @package OmnideskBundle\Factory\Staff
 */
class StaffDataTransformerFactory
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
     * @var AddStaffRequestDataTransformer
     */
    protected $addRequest;

    /**
     * @var EditStaffRequestDataTransformer
     */
    protected $editRequest;

    /**
     * @var ListStaffRequestDataTransformer
     */
    protected $listRequest;

    /**
     * @var ViewStaffRequestDataTransformer
     */
    protected $viewRequest;

    /**
     * @var ListStaffResponseDataTransformer
     */
    protected $listResponse;

    /**
     * @var ViewStaffResponseDataTransformer
     */
    protected $viewResponse;

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
