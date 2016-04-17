<?php


use App\DbServices\DropBoxTokenDbService;
use App\Kernel\IoC;

class DropBoxTokensCest
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
    public function it_creates_area(IntegrationTester $I)
    {
        $nowDateTime = new DateTime();

        $expectedData = ['token' => 'some-token', 'description' => 'some-description', 'created_at' => $nowDateTime->format('Y-m-d H:i:s')];

        $I->dontSeeInDatabase('drop_box_tokens', $expectedData);

        $dropBoxDbService = IoC::resolve(DropBoxTokenDbService::class);

        $I->assertNotSame(false, $dropBoxDbService->create($expectedData));

        $I->seeInDatabase('drop_box_tokens', $expectedData);
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_retrieves_latest_token(IntegrationTester $I)
    {
        $dropBoxTokenDbService = IoC::resolve(DropBoxTokenDbService::class);
        $nowDateTime = new DateTime();
        $token1 = ['token' => 'some-token', 'description' => 'some-description', 'created_at' => $nowDateTime->format('Y-m-d H:i:s')];
        $nowDateTime = new DateTime();
        $token2 = ['token' => 'some-token-2', 'description' => 'some-description-2', 'created_at' => $nowDateTime->format('Y-m-d H:i:s')];

        $I->haveInDatabase('drop_box_tokens', $token1);
        $I->haveInDatabase('drop_box_tokens', $token2);

        $actualDropBoxToken = $dropBoxTokenDbService->getLatest();
        $I->assertEquals($token2['token'], $actualDropBoxToken['token']);
        $I->assertEquals($token2['description'], $actualDropBoxToken['description']);
        $I->assertEquals($token2['created_at'], $actualDropBoxToken['created_at']);
    }
}
