<?php
namespace OmnideskBundle\Service;

use OmnideskBundle\DataTransformer\Response\GetLanguageResponseDataTransformer;
use OmnideskBundle\Response\Language\GetLanguageResponse;

/**
 * Class LanguageService
 * @package OmnideskBundle\Service
 */
class LanguageService
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var GetLanguageResponseDataTransformer
     */
    protected $getLanguageResponseDataTransformer;

    /**
     * LanguageService constructor.
     * @param RequestService                     $requestService
     * @param GetLanguageResponseDataTransformer $getLanguageResponseDataTransformer
     */
    public function __construct(
        RequestService $requestService,
        GetLanguageResponseDataTransformer $getLanguageResponseDataTransformer
    ) {
        $this->requestService = $requestService;
        $this->getLanguageResponseDataTransformer = $getLanguageResponseDataTransformer;
    }

    /**
     * @return GetLanguageResponse
     */
    public function get()
    {
        $result = $this->requestService->get('languages', []);

        return $this->getLanguageResponseDataTransformer->transform($result);
    }
}
