<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers\Api;

use App\DbServices\CategoryDbService;
use App\DbServices\AreaDbService;
use App\Transformers\ApiCategoryListTransformer;

/**
 * Class ApiDistrictsController.
 */

/**
 * Class ApiDistrictsController.
 */
class ApiCategoriesController extends ApiController
{
    /**
     * @var AreaDbService
     */
    protected $categoryService;
    protected $apiCategoryListTransformer;

    /**
     * ApiDistrictsController constructor.
     */
    public function __construct()
    {
        $this->categoryService = new CategoryDbService();
        $this->apiCategoryListTransformer = new ApiCategoryListTransformer();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $categories = $this->categoryService->get();

        return $this->respondWithSuccess($this->apiCategoryListTransformer->transformCollection($categories));
    }
}