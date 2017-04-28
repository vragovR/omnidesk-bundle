<?php
namespace OmnideskBundle\DataTransformer\Model;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Model\Language;

/**
 * Class LanguageDataTransformer
 * @package OmnideskBundle\DataTransformer\Model
 */
class LanguageDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Language
     */
    public function transform($value)
    {
        $model = new Language();
        $model
            ->setId($value['language_id'])
            ->setCode($value['code'])
            ->setTitle($value['title'])
            ->setActive($value['active']);

        return $model;
    }

    /**
     * @param array $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
