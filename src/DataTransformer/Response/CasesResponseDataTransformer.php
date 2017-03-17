<?php
namespace OmnideskBundle\DataTransformer\Response;

use OmnideskBundle\DataTransformer\Entity\CasesDataTransformer;
use OmnideskBundle\Response\Cases\CasesResponse;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class CasesResponseDataTransformer
 * @package OmnideskBundle\DataTransformer\Response
 */
class CasesResponseDataTransformer implements DataTransformerInterface
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
     * @return CasesResponse
     */
    public function transform($value)
    {
        $response = new CasesResponse();

        $case = $this->casesDataTransformer->transform($value['case']);

        $response->setCases($case);

        return $response;
    }

    /**
     * @param CasesResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
