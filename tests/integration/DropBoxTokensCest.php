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
}
