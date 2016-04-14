<?php namespace tests\api;

use ApiTester;
use App\DbServices\FundDbService;
use App\Manipulators\FundManipulator;
use App\Transformers\ApiGetFundTransformer;
use App\Transformers\ApiSearchFundTransformer;

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
        $fundsService = new FundDbService();
        $apiFundTransformer = new ApiGetFundTransformer();
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
        $fundsService = new FundDbService();
        $apiSearchFundTransformer = new ApiSearchFundTransformer();
        $fundManipulator = new FundManipulator();
        $allFunds = $fundsService->get();


        $expectedData = $fundsService->search($allFunds[0]['title']);
        $expectedData = $apiSearchFundTransformer->transformCollection($expectedData);

        $I->amOnPage('/api/v1/funds/search?term='.$allFunds[0]['title']);

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }
}
