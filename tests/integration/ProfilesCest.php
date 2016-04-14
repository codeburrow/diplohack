<?php namespace tests\integration;

use App\DbServices\ProfileDbService;
use IntegrationTester;

class ProfilesCest
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
        $profileDbService = new ProfileDbService();

        // finds and returns
        $expectedData = ['name' => 'expected-name'];
        $I->haveInDatabase('profiles', $expectedData);
        $I->assertNotSame(false, $actualProfile = $profileDbService->findOrCreateByName($expectedData['name']));
        $I->assertEquals($expectedData['name'], $actualProfile['name']);

        // does not find and creates instead
        $expectedData = ['name' => 'expected-name-1'];
        $I->dontSeeInDatabase('profiles', $expectedData);
        $I->assertNotSame(false, $actualProfile = $profileDbService->findOrCreateByName($expectedData['name']));
        $I->assertEquals($expectedData['name'], $actualProfile['name']);
        $I->seeInDatabase('profiles', $expectedData);
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_profile_by_id(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $expectedProfileId = $I->haveInDatabase('profiles', $expectedData);

        $profileDbService = new ProfileDbService();

        $actualProfile = $profileDbService->findById($expectedProfileId);

        $I->assertEquals($expectedData, array_intersect_key($actualProfile, array_flip(['name', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_profile_by_name(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $expectedProfileId = $I->haveInDatabase('profiles', $expectedData);

        $profileDbService = new ProfileDbService();

        $actualProfile = $profileDbService->findByName('expected-name');

        $I->assertEquals($expectedProfileId, $actualProfile['id']);
        $I->assertEquals($expectedData, array_intersect_key($actualProfile, array_flip(['name', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_creates_profile(IntegrationTester $I)
    {
        $expectedData = ['name' => 'expected-name', 'description' => 'expected-description'];
        $I->dontSeeInDatabase('profiles', $expectedData);

        $profileDbService = new ProfileDbService();

        $I->assertNotSame(false, $actualProfileId = $profileDbService->create($expectedData));

        $actualProfile = $profileDbService->findByName($expectedData['name']);

        $I->seeInDatabase('profiles', $expectedData);

        $I->assertEquals($expectedData, array_intersect_key($actualProfile, array_flip(['name', 'description'])));
    }
}
