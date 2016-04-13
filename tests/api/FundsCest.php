<?php


use App\Manipulators\FundManipulator;
use App\Services\FundsService;
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
        var_dump($allFunds[0]['title']);
        var_dump($expectedData);exit;
        $expectedData = $apiFundTransformer
            ->transformCollection($fundManipulator
                ->concatenateLinks($expectedData));


        $I->amOnPage('/api/v1/funds/search?term='.$allFunds[0]['title']);

        $I->seeResponseContainsJson([
            'status_code' => 201,
            'data'        => $expectedData
        ]);
    }
}
