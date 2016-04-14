<?php


class AreasCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }

    /** @test */
    public function it_returns_areas_select_list(ApiTester $I)
    {
        $I->haveInDatabase('areas', ['name' => 'area1']);
        $I->haveInDatabase('areas', ['name' => 'area2']);
//        $area
//
//        $expectedData = [
//            [
//                "id"   => $item["id"],
//                "text" => $item["name"],
//            ]
//        ];

        $I->amOnPage('/api/v1/areas/list');

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }

}
