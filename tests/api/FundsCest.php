<?php


use App\Manipulators\FundManipulator;
use App\Services\AreaService;
use App\Services\CategoryService;
use App\Services\FundsService;
use App\Services\ProfileService;
use App\Transformers\ApiAreasListTransformer;
use App\Transformers\ApiCategoryListTransformer;
use App\Transformers\ApiFundTransformer;
use App\Transformers\ApiProfilesListTransformer;

class FundsCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    /** @test */
    public function it_returns_all_funds(ApiTester $I)
    {
        $fundsService = new FundsService();
        $apiFundTransformer = new ApiFundTransformer();
        $fundManipulator = new FundManipulator();
        $expectedData = $apiFundTransformer
            ->transformCollection($fundManipulator
                ->concatenateLinks($fundsService->get()));

        $I->amOnPage('/api/v1/funds');

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }

    /** @test */
    public function it_searches_funds(ApiTester $I)
    {
        $fundsService = new FundsService();
        $apiFundTransformer = new ApiFundTransformer();
        $fundManipulator = new FundManipulator();
        $allFunds = $fundsService->get();

        $expectedData = $fundsService->search($allFunds[0]['title']);
        $expectedData = $apiFundTransformer
            ->transformCollection($fundManipulator
                ->concatenateLinks($expectedData));

        $I->amOnPage('/api/v1/funds/search?term='.$allFunds[0]['title']);

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }

    /** @test */
    public function it_returns_areas_select_list(ApiTester $I)
    {
        $areaService = new AreaService();
        $apiAreasListTransformer = new ApiAreasListTransformer();
        $areas = $areaService->get();

        $expectedData = $apiAreasListTransformer->transformCollection($areas);

        $I->amOnPage('/api/v1/areas/list');

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }

    /** @test */
    public function it_returns_profiles_select_list(ApiTester $I)
    {
        $profileService = new ProfileService();
        $apiProfilesListTransformer = new ApiProfilesListTransformer();
        $areas = $profileService->get();

        $expectedData = $apiProfilesListTransformer->transformCollection($areas);

        $I->amOnPage('/api/v1/profiles/list');

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
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
