<?php
namespace OmnideskBundle\DataTransformer\Request;

use OmnideskBundle\Request\Cases\AddCasesRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class AddCasesRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class AddCasesRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param AddCasesRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'user_email' => $value->getUserEmail(),
            'user_phone' => $value->getUserPhone(),
            'user_full_name' => $value->getUserFullName(),
            'subject' => $value->getSubject(),
            'content' => $value->getContent(),
            'content_html' => $value->getContentHtml(),
            'group_id' => $value->getGroupId(),
            'language_id' => $value->getLanguageId(),
            'custom_fields' => $value->getCustomFields(),
            'labels' => $value->getLabels(),
        ];
    }

    /**
     * @param array $value
     * @return AddCasesRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
