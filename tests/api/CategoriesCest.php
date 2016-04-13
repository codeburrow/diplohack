<?php


use App\Services\CategoryService;
use App\Transformers\ApiCategoryListTransformer;

class CategoriesCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    /** @test */
    public function it_returns_categories_select_list(ApiTester $I)
    {
        $categoryService = new CategoryService();
        $apiCategoryListTransformer = new ApiCategoryListTransformer();
        $areas = $categoryService->get();

        $expectedData = $apiCategoryListTransformer->transformCollection($areas);

        $I->amOnPage('/api/v1/categories/list');

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }

}
