<?php


class FundsCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    /** @test */
    public function it_returns_funds(ApiTester $I)
    {
        $I->amOnPage('/api/v1/funds');

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data' => []
        ]);
    }
}
