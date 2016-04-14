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

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_assigns_an_area_by_id(IntegrationTester $I)
    {
        $fundDbService = new FundDbService();
        $I->haveInDatabase('funds', ['title' => 'fund-title']);
        $I->haveInDatabase('areas', ['name' => 'area-name']);
        $fundId = $I->grabFromDatabase('funds', 'id', ['title' => 'fund-title']);
        $areaId = $I->grabFromDatabase('areas', 'id', ['name' => 'area-name']);

        $I->dontSeeInDatabase('area_fund', ['area_id' => $areaId, 'fund_id' => $fundId]);

        $fundDbService->assignAreaById($fundId, $areaId);

        $I->seeInDatabase('area_fund', ['area_id' => $areaId, 'fund_id' => $fundId]);
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_assigns_a_category_by_id(IntegrationTester $I)
    {
        $fundDbService = new FundDbService();
        $I->haveInDatabase('funds', ['title' => 'fund-title']);
        $I->haveInDatabase('categories', ['name' => 'category-name']);
        $fundId = $I->grabFromDatabase('funds', 'id', ['title' => 'fund-title']);
        $categoryId = $I->grabFromDatabase('categories', 'id', ['name' => 'category-name']);

        $I->dontSeeInDatabase('category_fund', ['category_id' => $categoryId, 'fund_id' => $fundId]);

        $fundDbService->assignCategoryById($fundId, $categoryId);

        $I->seeInDatabase('category_fund', ['category_id' => $categoryId, 'fund_id' => $fundId]);
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_assigns_link_by_id(IntegrationTester $I)
    {
        $fundDbService = new FundDbService();
        $I->haveInDatabase('funds', ['title' => 'fund-title']);
        $I->haveInDatabase('links', ['url' => 'link-url']);
        $fundId = $I->grabFromDatabase('funds', 'id', ['title' => 'fund-title']);
        $linkId = $I->grabFromDatabase('links', 'id', ['url' => 'link-url']);

        $I->dontSeeInDatabase('fund_link', ['link_id' => $linkId, 'fund_id' => $fundId]);

        $fundDbService->assignLinkById($fundId, $linkId);

        $I->seeInDatabase('fund_link', ['link_id' => $linkId, 'fund_id' => $fundId]);
    }
}