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
    public function it_finds_category_by_name(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $expectedCategoryId = $I->haveInDatabase('categories', $expectedData);

        $categoryDbService = new CategoryDbService();

        $actualCategory = $categoryDbService->findByName('expected-name');

        $I->assertEquals($expectedCategoryId, $actualCategory['id']);
        $I->assertEquals($expectedData, array_intersect_key($actualCategory, array_flip(['name', 'description'])));
    }
}
