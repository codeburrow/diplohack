<?php namespace tests\integration;

use App\DbServices\CategoryDbService;
use IntegrationTester;

class CategoriesCest
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
    public function it_finds_category_by_id(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $expectedCategoryId = $I->haveInDatabase('categories', $expectedData);

        $categoryDbService = new CategoryDbService();

        $actualCategory = $categoryDbService->findById($expectedCategoryId);

        $I->assertEquals($expectedData, array_intersect_key($actualCategory, array_flip(['name', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_category_by_name(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $expectedCategoryId = $I->haveInDatabase('categories', $expectedData);

        $categoryDbService = new CategoryDbService();

        $actualCategory = $categoryDbService->findByName('expected-name');

        $I->assertEquals($expectedCategoryId, $actualCategory['id']);
        $I->assertEquals($expectedData, array_intersect_key($actualCategory, array_flip(['name', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_creates_category(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $I->dontSeeInDatabase('categories', $expectedData);

        $categoryDbService = new CategoryDbService();

        $I->assertNotSame(false, $actualCategoryId = $categoryDbService->create($expectedData));

        $actualCategory = $categoryDbService->findByName($expectedData['name']);

        $I->seeInDatabase('categories', $expectedData);

        $I->assertEquals($expectedData, array_intersect_key($actualCategory, array_flip(['name', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_or_creates_by_name(IntegrationTester $I)
    {
        $categoryDbService = new CategoryDbService();

        // finds and returns
        $expectedData = ['name' => 'expected-name'];
        $I->haveInDatabase('categories', $expectedData);
        $I->assertNotSame(false, $actualCategory = $categoryDbService->findOrCreateByName($expectedData['name']));
        $I->assertEquals($expectedData['name'], $actualCategory['name']);

        // does not find and creates instead
        $expectedData = ['name' => 'expected-name-1'];
        $I->dontSeeInDatabase('categories', $expectedData);
        $I->assertNotSame(false, $actualCategory = $categoryDbService->findOrCreateByName($expectedData['name']));
        $I->assertEquals($expectedData['name'], $actualCategory['name']);
        $I->seeInDatabase('categories', $expectedData);
    }

}
