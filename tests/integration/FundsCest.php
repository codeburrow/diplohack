<?php namespace tests\integration;

use App\DbServices\FundDbService;
use IntegrationTester;

class FundsCest
{
    public function _before(IntegrationTester $I)
    {
    }

    public function _after(IntegrationTester $I)
    {
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_or_creates_by_name(IntegrationTester $I)
    {
        $fundDbService = new FundDbService();

        // finds and returns
        $expectedData = ['title' => 'expected-title'];
        $I->haveInDatabase('funds', $expectedData);
        $I->assertNotSame(false, $actualFund = $fundDbService->findOrCreateByTitle($expectedData['title']));
        $I->assertEquals($expectedData['title'], $actualFund['title']);

        // does not find and creates instead
        $expectedData = ['title' => 'expected-name-1'];
        $I->dontSeeInDatabase('funds', $expectedData);
        $I->assertNotSame(false, $actualFund = $fundDbService->findOrCreateByTitle($expectedData['title']));
        $I->assertEquals($expectedData['title'], $actualFund['title']);
        $I->seeInDatabase('funds', $expectedData);
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_fund_by_id(IntegrationTester $I)
    {
        $expectedData = ['title' => 'expected-title', 'description' => 'expected-description'];
        $expectedFundId = $I->haveInDatabase('funds', $expectedData);

        $fundDbService = new FundDbService();

        $actualFund = $fundDbService->findById($expectedFundId);

        $I->assertEquals($expectedData, array_intersect_key($actualFund, array_flip(['title', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_fund_by_name(IntegrationTester $I)
    {
        $expectedData = ['title' => 'expected-title', 'description' => 'expected-description'];
        $expectedFundId = $I->haveInDatabase('funds', $expectedData);

        $fundDbService = new FundDbService();

        $actualFund = $fundDbService->findByTitle('expected-title');

        $I->assertEquals($expectedFundId, $actualFund['id']);
        $I->assertEquals($expectedData, array_intersect_key($actualFund, array_flip(['title', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_creates_fund(IntegrationTester $I)
    {
        $expectedData = ['title' => 'expected-title', 'description' => 'expected-description'];

        $I->dontSeeInDatabase('funds', $expectedData);

        $fundDbService = new FundDbService();

        $I->assertNotSame(false, $actualFundId = $fundDbService->create($expectedData));

        $actualFund = $fundDbService->findByTitle($expectedData['title']);

        $I->seeInDatabase('funds', $expectedData);

        $I->assertEquals($expectedData, array_intersect_key($actualFund, array_flip(['title', 'description'])));
    }
}

