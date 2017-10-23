<?php
namespace OmnideskBundle\Exception;

/**
 * Class StaffAlreadyExistException
 * @package OmnideskBundle\Exception
 */
class StaffAlreadyExistException extends \Exception
{
    /**
     * @var string
     */
    public $message = 'Staff already exist.';
}
