<?php


use App\Services\ProfileService;
use App\Transformers\ApiProfilesListTransformer;

class ProfilesCest
{
    public function _before(ApiTester $I)
    {
    }

    public function _after(ApiTester $I)
    {
    }


    /** @test */
    public function it_returns_profiles_select_list(ApiTester $I)
    {
        $profileService = new ProfileService();
        $apiProfilesListTransformer = new ApiProfilesListTransformer();
        $areas = $profileService->get();

        $expectedData = $apiProfilesListTransformer->transformCollection($areas);

        $I->amOnPage('/api/v1/profiles/list');

        $I->seeResponseContainsJson([
            'status_code' => 200,
            'data'        => $expectedData
        ]);
    }

}
