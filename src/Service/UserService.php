<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\Factory\User\UserConfigurationFactory;
use OmnideskBundle\Factory\User\UserDataTransformerFactory;
use OmnideskBundle\Request\User\AddUserRequest;
use OmnideskBundle\Request\User\EditUserRequest;
use OmnideskBundle\Request\User\ListUserRequest;
use OmnideskBundle\Request\User\ViewUserRequest;
use OmnideskBundle\Response\User\ListUserResponse;
use OmnideskBundle\Response\User\UserResponse;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * Class UserService
 * @package OmnideskBundle\Service
 */
class UserService extends AbstractService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var UserDataTransformerFactory
     */
    protected $transformerFactory;

    /**
     * @var UserConfigurationFactory
     */
    protected $configurationFactory;

    /**
     * UserService constructor.
     * @param RequestService              $requestService
     * @param UserDataTransformerFactory $transformerFactory
     * @param UserConfigurationFactory   $configurationFactory
     */
    public function __construct(
        RequestService $requestService,
        UserDataTransformerFactory $transformerFactory,
        UserConfigurationFactory $configurationFactory
    ) {
        $this->requestService = $requestService;
        $this->transformerFactory = $transformerFactory;
        $this->configurationFactory = $configurationFactory;
    }

    /**
     * @param AddUserRequest $request
     * @return UserResponse
     */
    public function add(AddUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_ADD);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_ADD);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->post('users', $params);

        return $this->transformerFactory->get(UserDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param EditUserRequest $request
     * @return UserResponse
     */
    public function edit(EditUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_EDIT);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_EDIT);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("users/{$params['user_id']}", ['user' => $params]);

        return $this->transformerFactory->get(UserDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ListUserRequest $request
     * @return ListUserResponse
     */
    public function lists(ListUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_LIST);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_LIST);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get('users', $params);

        return $this->transformerFactory->get(UserDataTransformerFactory::RESPONSE_LIST)->transform($result);
    }

    /**
     * @param ViewUserRequest $request
     * @return UserResponse
     */
    public function view(ViewUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->get("users/{$params['user_id']}");

        return $this->transformerFactory->get(UserDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewUserRequest $request
     * @return UserResponse
     */
    public function block(ViewUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("users/{$params['user_id']}/block");

        return $this->transformerFactory->get(UserDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewUserRequest $request
     * @return UserResponse
     */
    public function restore(ViewUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("users/{$params['user_id']}/restore");

        return $this->transformerFactory->get(UserDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewUserRequest $request
     * @return UserResponse
     */
    public function disable(ViewUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $result = $this->requestService->put("users/{$params['user_id']}/disable");

        return $this->transformerFactory->get(UserDataTransformerFactory::RESPONSE_VIEW)->transform($result);
    }

    /**
     * @param ViewUserRequest $request
     */
    public function delete(ViewUserRequest $request)
    {
        $transformer = $this->transformerFactory->get(UserDataTransformerFactory::REQUEST_VIEW);
        $configuration = $this->configurationFactory->get(UserConfigurationFactory::CONFIGURATION_VIEW);

        try {
            $params = $this->checkRequest($request, $transformer, $configuration);
        } catch (InvalidConfigurationException $exception) {
            throw new InvalidConfigurationException($exception->getMessage());
        }

        $this->requestService->delete("users/{$params['user_id']}");
    }
}
