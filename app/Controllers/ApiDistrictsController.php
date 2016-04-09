<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers;

use App\Controllers\Api\ApiController;
use App\Services\DistrictService;
use App\Transformers\ApiDistrictsListTransformer;

/**
 * Class ApiDistrictsController.
 */

/**
 * Class ApiDistrictsController.
 */
class ApiDistrictsController extends ApiController
{
    /**
     * @var DistrictService
     */
    protected $districtService;
    protected $apiDistrictsListTransformer;

    /**
     * ApiDistrictsController constructor.
     */
    public function __construct()
    {
        $this->districtService = new DistrictService();
        $this->apiDistrictsListTransformer = new ApiDistrictsListTransformer();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $districts = $this->districtService->getAll();

        if (! $districts) return $this->respondNotFound();

        return $this->apiDistrictsListTransformer->transformCollection($districts);
    }
}