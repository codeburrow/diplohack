<?php

use App\Manipulators\FundManipulator;
use App\DbServices\FundsDbService;
use App\Transformers\ApiFundTransformer;

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
        $fundsService = new FundsDbService();
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
        $fundsService = new FundsDbService();
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
}
