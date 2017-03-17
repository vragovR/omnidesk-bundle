<?php
namespace OmnideskBundle\DataTransformer\Response;

use OmnideskBundle\DataTransformer\Entity\CasesDataTransformer;
use OmnideskBundle\Response\Cases\GetCasesResponse;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class CreateCasesDataTransformer
 * @package OmnideskBundle\DataTransformer\Request
 */
class GetCasesResponseDataTransformer implements DataTransformerInterface
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
     * @return GetCasesResponse
     */
    public function transform($value)
    {
        $response = new GetCasesResponse();

        foreach ($value as $item) {
            if (isset($item['case'])) {
                $response->addCases($this->casesDataTransformer->transform($item['case']));
            }
        }

        $response->setTotalCount($value['total_count']);

        return $response;
    }

    /**
     * @param GetCasesResponse $value
     * @return array
     */
    public function reverseTransform($value)
    {
        throw new \LogicException('Method not implemented.');
    }
}
