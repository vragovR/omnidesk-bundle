<?php
namespace OmnideskBundle\DataTransformer\Response;

use OmnideskBundle\DataTransformer\Entity\CasesDataTransformer;
use OmnideskBundle\Response\Cases\CreateCasesResponse;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class CreateCasesDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class CreateCasesResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @var CasesDataTransformer
     */
    protected $casesDataTransformer;

    /**
     * GetCasesResponseDataTransformer constructor.
     * @param CasesDataTransformer $casesDataTransformer
     */
    public function __construct(CasesDataTransformer $casesDataTransformer)
    {
        $this->casesDataTransformer = $casesDataTransformer;
    }

    /**
     * @param array $value
     * @return CreateCasesResponse
     */
    public function transform($value)
    {
        $response = new CreateCasesResponse();

        $case = $this->casesDataTransformer->transform($value['case']);

        $response->setCase($case);

        return $response;
    }

    /**
     * @param CreateCasesResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
