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
}
