<?php
namespace OmnideskBundle\DataTransformer\Entity;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Entity\Language;

/**
 * Class LanguageDataTransformer
 * @package OmnideskBundle\DataTransformer\Entity
 */
class LanguageDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Language
     */
    public function transform($value)
    {
        $entity = new Language();
        $entity
            ->setId($value['language_id'])
            ->setCode($value['code'])
            ->setTitle($value['title'])
            ->setActive($value['active']);

        return $entity;
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
