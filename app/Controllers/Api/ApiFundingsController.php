<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers\Api;

use App\Services\FundingService;
use App\Transformers\ApiFundingsTransformer;

/**
 * Class WelcomeController.
 */
class ApiFundingsController extends ApiController
{
    /**
     * @var ApiFundingsTransformer
     */
    private $apiFundingsTransformer;

    /**
     * @var FundingService
     */
    private $fundingsService;

    /**
     * FundingsController constructor.
     */
    public function __construct()
    {
        $this->apiFundingsTransformer = new ApiFundingsTransformer();
        $this->fundingsService = new FundingService();
    }

    /**
     * @return string
     */
    public function getAll()
    {
        $fundings = $this->fundingsService->fetchAllFundings();

        return $this->respondWithSuccess(
            $this->apiFundingsTransformer->transformCollection($fundings)
        );
    }

    /**
     * Search all tables by user term.
     */
    public function search()
    {
        // TODO: add validator for terms

        $term = $_GET['term'];

        $fundings = $this->fundingsService->search($term);

        return $this->respondWithSuccess(
            $this->apiFundingsTransformer->transformCollection($fundings)
        );
    }
}