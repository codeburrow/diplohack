<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers\Api;

use App\Services\AreaService;
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
     * @var AreaService
     */
    protected $areaService;
    protected $apiAreasListTransformer;

    /**
     * ApiDistrictsController constructor.
     */
    public function __construct()
    {
        $this->areaService = new AreaService();
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