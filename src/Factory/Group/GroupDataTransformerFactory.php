<?php
namespace OmnideskBundle\Factory\Group;

use OmnideskBundle\DataTransformer\Request\Group\AddGroupRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Group\EditGroupRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Group\ListGroupRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\Group\ViewGroupRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\Group\ViewGroupResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\Group\ListGroupResponseDataTransformer;
use OmnideskBundle\Factory\AbstractDataTransformerFactory;

/**
 * Class GroupDataTransformerFactory
 * @package OmnideskBundle\Factory\Group
 */
class GroupDataTransformerFactory extends AbstractDataTransformerFactory
{
    /**
     * GroupDataTransformerFactory constructor.
     * @param AddGroupRequestDataTransformer   $addRequest
     * @param EditGroupRequestDataTransformer  $editRequest
     * @param ListGroupRequestDataTransformer  $listRequest
     * @param ViewGroupRequestDataTransformer  $viewRequest
     * @param ListGroupResponseDataTransformer $listResponse
     * @param ViewGroupResponseDataTransformer $viewResponse
     */
    public function __construct(
        AddGroupRequestDataTransformer $addRequest,
        EditGroupRequestDataTransformer $editRequest,
        ListGroupRequestDataTransformer $listRequest,
        ViewGroupRequestDataTransformer $viewRequest,
        ListGroupResponseDataTransformer $listResponse,
        ViewGroupResponseDataTransformer $viewResponse
    ) {
        $this->addRequest = $addRequest;
        $this->editRequest = $editRequest;
        $this->listRequest = $listRequest;
        $this->viewRequest = $viewRequest;
        $this->viewResponse = $viewResponse;
        $this->listResponse = $listResponse;
    }
}
