<?php
namespace OmnideskBundle\DataTransformer\Response\Language;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\DataTransformer\Model\LanguageDataTransformer;
use OmnideskBundle\Response\Language\GetLanguageResponse;

/**
 * Class ListLanguageResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class ListLanguageResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var LanguageDataTransformer
     */
    protected $languageDataTransformer;

    /**
     * GetCasesResponseDataTransformer constructor.
     * @param LanguageDataTransformer $languageDataTransformer
     */
    public function __construct(LanguageDataTransformer $languageDataTransformer)
    {
        $this->languageDataTransformer = $languageDataTransformer;
    }

    /**
     * @param array $value
     * @return GetLanguageResponse
     */
    public function transform($value)
    {
        $response = new GetLanguageResponse();

        foreach ($value as $item) {
            if (isset($item['language'])) {
                $response->addLanguage($this->languageDataTransformer->transform($item['language']));
            }
        }

        $response->setTotalCount($value['total_count']);

        return $response;
    }

    /**
     * @param GetLanguageResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
