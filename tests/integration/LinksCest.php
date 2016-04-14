<?php


use App\DbServices\LinkDbService;

class LinksCest
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
    public function it_finds_or_creates_by_url(IntegrationTester $I)
    {
        $linkDbService = new LinkDbService();

        // finds and returns
        $expectedData = ['url' => 'expected-url'];
        $I->haveInDatabase('links', $expectedData);
        $I->assertNotSame(false, $actualLink = $linkDbService->findOrCreateByUrl($expectedData['url']));
        $I->assertEquals($expectedData['url'], $actualLink['url']);

        // does not find and creates instead
        $expectedData = ['url' => 'expected-url-1'];
        $I->dontSeeInDatabase('links', $expectedData);
        $I->assertNotSame(false, $actualLink = $linkDbService->findOrCreateByUrl($expectedData['url']));
        $I->assertEquals($expectedData['url'], $actualLink['url']);
        $I->seeInDatabase('links', $expectedData);
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_link_by_id(IntegrationTester $I)
    {
        $expectedData = ['url' => 'expected-url', 'description' => 'expected-description'];
        $expectedLinkId = $I->haveInDatabase('links', $expectedData);

        $linkDbService = new LinkDbService();

        $actualLink = $linkDbService->findById($expectedLinkId);

        $I->assertEquals($expectedData, array_intersect_key($actualLink, array_flip(['url', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_finds_link_by_url(IntegrationTester $I)
    {
        $expectedData = ['url' => 'expected-url', 'description' => 'expected-description'];
        $expectedLinkId = $I->haveInDatabase('links', $expectedData);

        $linkDbService = new LinkDbService();

        $actualLink = $linkDbService->findByUrl('expected-url');

        $I->assertEquals($expectedLinkId, $actualLink['id']);
        $I->assertEquals($expectedData, array_intersect_key($actualLink, array_flip(['url', 'description'])));
    }

    /**
     * @test
     * @param IntegrationTester $I
     */
    public function it_creates_link(IntegrationTester $I)
    {
        $expectedData = ['url' => 'expected-url', 'description' => 'expected-description'];

        $I->dontSeeInDatabase('links', $expectedData);

        $linkDbService = new LinkDbService();

        $I->assertNotSame(false, $actualLinkId = $linkDbService->create($expectedData));

        $actualLink = $linkDbService->findByUrl($expectedData['url']);

        $I->seeInDatabase('links', $expectedData);

        $I->assertEquals($expectedData, array_intersect_key($actualLink, array_flip(['url', 'description'])));
    }
}

