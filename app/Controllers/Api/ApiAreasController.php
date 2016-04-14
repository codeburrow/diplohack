<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers\Api;

use App\DbServices\AreaDbService;
use App\Transformers\ApiAreasListTransformer;
use App\Transformers\ApiProfilesListTransformer;

/**
 * Class ApiDistrictsController.
 */

/**
 * Class ApiDistrictsController.
 */
class ApiAreasController extends ApiController
{
    /**
     * @var AreaDbService
     */
    protected $areaService;
    protected $apiAreasListTransformer;

    /**
     * ApiDistrictsController constructor.
     */
    public function __construct()
    {
        $this->areaService = new AreaDbService();
        $this->apiAreasListTransformer = new ApiAreasListTransformer();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $area = $this->areaService->get();

        return $this->respondWithSuccess($this->apiAreasListTransformer->transformCollection($area));
    }
}