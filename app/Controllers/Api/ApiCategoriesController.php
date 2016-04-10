<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 4/9/16
 */
namespace App\Controllers\Api;

use App\Services\CategoryService;
use App\Services\AreaService;
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
     * @var AreaService
     */
    protected $categoryService;
    protected $apiCategoryListTransformer;

    /**
     * ApiDistrictsController constructor.
     */
    public function __construct()
    {
        $this->categoryService = new CategoryService();
        $this->apiCategoryListTransformer = new ApiCategoryListTransformer();
    }

    /**
     * @return array
     */
    public function getList()
    {
        $categories = $this->categoryService->getAll();

        return $this->respondWithSuccess($this->apiCategoryListTransformer->transformCollection($categories));
    }
}