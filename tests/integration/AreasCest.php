<?php


use App\DbServices\AreaDbService;

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
}
