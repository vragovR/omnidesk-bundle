<?php
namespace OmnideskBundle\Factory\User;

use OmnideskBundle\DataTransformer\Request\User\AddUserRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\User\EditUserRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\User\ListUserRequestDataTransformer;
use OmnideskBundle\DataTransformer\Request\User\ViewUserRequestDataTransformer;
use OmnideskBundle\DataTransformer\Response\User\ListUserResponseDataTransformer;
use OmnideskBundle\DataTransformer\Response\User\ViewUserResponseDataTransformer;
use OmnideskBundle\Factory\AbstractDataTransformerFactory;

/**
 * Class UserDataTransformerFactory
 * @package OmnideskBundle\Factory\User
 */
class UserDataTransformerFactory extends AbstractDataTransformerFactory
{
    /**
     * UserService constructor.
     * @param AddUserRequestDataTransformer   $addRequest
     * @param EditUserRequestDataTransformer  $editRequest
     * @param ListUserRequestDataTransformer  $listRequest
     * @param ViewUserRequestDataTransformer  $viewRequest
     * @param ListUserResponseDataTransformer $listResponse
     * @param ViewUserResponseDataTransformer $viewResponse
     */
    public function __construct(
        AddUserRequestDataTransformer $addRequest,
        EditUserRequestDataTransformer $editRequest,
        ListUserRequestDataTransformer $listRequest,
        ViewUserRequestDataTransformer $viewRequest,
        ListUserResponseDataTransformer $listResponse,
        ViewUserResponseDataTransformer $viewResponse
    ) {
        $this->addRequest = $addRequest;
        $this->editRequest = $editRequest;
        $this->listRequest = $listRequest;
        $this->viewRequest = $viewRequest;
        $this->viewResponse = $viewResponse;
        $this->listResponse = $listResponse;
    }
}
