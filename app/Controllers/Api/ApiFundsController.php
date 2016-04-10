<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since 4/7/16
 */
namespace App\Controllers\Api;

use App\Manipulators\FundManipulator;
use App\Services\FundsService;
use App\Services\UrlService;
use App\Transformers\ApiFundTransformer;

/**
 * Class WelcomeController.
 */
class ApiFundsController extends ApiController
{
    /**
     * @var FundManipulator
     */
    protected $fundManipulator;
    /**
     * @var UrlService
     */
    protected $urlService;
    /**
     * @var ApiFundTransformer
     */
    private $apifundsTransformer;

    /**
     * @var FundsService
     */
    private $fundsService;

    /**
     * fundsController constructor.
     */
    public function __construct()
    {
        $this->apifundsTransformer = new ApiFundTransformer();
        $this->fundsService = new FundsService();
        $this->urlService = new UrlService();
        $this->fundManipulator = new FundManipulator();
    }

    /**
     * Get all funds.
     *
     * @return string
     */
    public function get()
    {
        $data = [];

        $data['funds'] = $this->fundsService->get();
        var_dump($data);
        exit;
        $data['urls'] = $this->urlService->getAll();

        $funds = $this->fundManipulator->simplify($data);

        return $this->respondWithSuccess(
            $this->apifundsTransformer->transformCollection($funds)
        );
    }

    /**
     * Search all tables by user term.
     */
    public function search()
    {
        // TODO: add validator for terms

        $term = $_GET['term'];

        $funds = $this->fundsService->search($term);

        return $this->respondWithSuccess(
            $this->apifundsTransformer->transformCollection($funds)
        );
    }
}