<?php namespace tests\api;

use ApiTester;
use App\DbServices\AreaDbService;
use App\Transformers\ApiAreasListTransformer;

class AreasCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    /**
     * @test
     * @param ApiTester $I
     */
    public function it_returns_areas_select_list(ApiTester $I)
    {
        $areaService = new AreaDbService();
        $apiAreasListTransformer = new ApiAreasListTransformer();
        $areas = $areaService->get();
        $expectedData = $apiAreasListTransformer->transformCollection($areas);
        $I->amOnPage('/api/v1/areas/list');
        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }

}
