<?php namespace tests\integration;

use App\DbServices\AreaDbService;
use IntegrationTester;

class AreasCest
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
    public function it_finds_area_by_name(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $expectedAreaId = $I->haveInDatabase('areas', $expectedData);

        $areaDbService = new AreaDbService();

        $actualArea = $areaDbService->findByName('expected-name');

        $I->assertEquals($expectedAreaId, $actualArea['id']);
        $I->assertEquals($expectedData, array_intersect_key($actualArea, array_flip(['name', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_or_creates_by_name(IntegrationTester $I)
    {
        $areaDbService = new AreaDbService();

        // finds and returns
        $expectedData = ['name' => 'expected-name'];
        $I->haveInDatabase('areas', $expectedData);
        $I->assertNotSame(false, $actualArea = $areaDbService->findOrCreateByName($expectedData['name']));
        $I->assertEquals($expectedData['name'], $actualArea['name']);

        // does not find and creates instead
        $expectedData = ['name' => 'expected-name-1'];
        $I->dontSeeInDatabase('areas', $expectedData);
        $I->assertNotSame(false, $actualArea = $areaDbService->findOrCreateByName($expectedData['name']));
        $I->assertEquals($expectedData['name'], $actualArea['name']);
        $I->seeInDatabase('areas', $expectedData);
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_area_by_id(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $expectedAreaId = $I->haveInDatabase('areas', $expectedData);

        $areaDbService = new AreaDbService();

        $actualArea = $areaDbService->findById($expectedAreaId);

        $I->assertEquals($expectedData, array_intersect_key($actualArea, array_flip(['name', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_creates_area(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];

        $I->dontSeeInDatabase('areas', $expectedData);

        $areaDbService = new AreaDbService();

        $I->assertNotSame(false, $actualAreaId = $areaDbService->create($expectedData));

        $actualArea = $areaDbService->findByName($expectedData['name']);

        $I->seeInDatabase('areas', $expectedData);

        $I->assertEquals($expectedData, array_intersect_key($actualArea, array_flip(['name', 'description'])));
    }
}

