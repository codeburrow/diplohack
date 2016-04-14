<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers\Api;

use App\DbServices\ProfileDbService;
use App\Transformers\ApiProfilesListTransformer;

/**
 * Class ApiDistrictsController.
 */
class ApiProfilesController extends ApiController
{
    protected $profileService;
    protected $apiProfilesListTransformer;

    /**
     * ApiDistrictsController constructor.
     */
    public function __construct()
    {
        $this->profileService = new ProfileDbService();
        $this->apiProfilesListTransformer = new ApiProfilesListTransformer();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $profiles = $this->profileService->get();

        return $this->respondWithSuccess($this->apiProfilesListTransformer->transformCollection($profiles));
    }
}