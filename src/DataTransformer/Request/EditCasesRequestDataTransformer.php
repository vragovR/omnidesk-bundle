<?php
namespace OmnideskBundle\DataTransformer\Request;

use OmnideskBundle\Request\Cases\EditCasesRequest;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class EditCasesRequestDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class EditCasesRequestDataTransformer implements DataTransformerInterface
{
    /**
     * @param EditCasesRequest $value
     * @return array
     */
    public function transform($value)
    {
        return [
            'case_id' => $value->getCaseId(),
            'subject' => $value->getSubject(),
            'group_id' => $value->getGroupId(),
            'staff_id' => $value->getStaffId(),
            'status' => $value->getStatus(),
            'priority' => $value->getPriority(),
            'language_id' => $value->getLanguageId(),
            'custom_fields' => $value->getCustomFields(),
            'add_labels' => $value->getAddLabels(),
            'delete_labels' => $value->getDeleteLabels(),
        ];
    }

    /**
     * @param array $value
     * @return EditCasesRequest
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
