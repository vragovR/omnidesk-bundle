<?php
namespace OmnideskBundle\DataTransformer\Model;

use OmnideskBundle\DataTransformer\DataTransformerInterface;
use OmnideskBundle\Model\Cases;

/**
 * Class CasesDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class CasesDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Cases
     */
    public function transform($value)
    {
        $model = new Cases();
        $model
            ->setId($value['case_id'])
            ->setNumber($value['case_number'])
            ->setSubject($value['subject'])
            ->setUserId($value['user_id'])
            ->setStaffId($value['staff_id'])
            ->setGroupId($value['group_id'])
            ->setStatus($value['status'])
            ->setPriority($value['priority'])
            ->setChanel($value['channel'])
            ->setRecipient($value['recipient'])
            ->setDeleted($value['deleted'])
            ->setSpam($value['spam'])
            ->setCreatedAt(new \DateTime($value['created_at']))
            ->setUpdatedAt(new \DateTime($value['updated_at']))
            ->setClosingSpeed(isset($value['closing_speed']) ? $value['closing_speed'] : null)
            ->setLanguageId($value['language_id'])
            ->setLabels($value['labels']);

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
