<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers\Api;

use App\Services\DistrictService;
use App\Transformers\ApiProfilesListTransformer;

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
        $this->apiDistrictsListTransformer = new ApiProfilesListTransformer();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $districts = $this->districtService->getAll();

        return $this->respondWithSuccess($this->apiDistrictsListTransformer->transformCollection($districts));
    }
}