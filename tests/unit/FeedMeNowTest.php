<?php
namespace FeedMeNow\Tests;

use \Prophecy;
use FeedMeNow\FeedMeNow;

/**
* @covers FeedMeNow\FeedMeNow
*/
class FeedMeNowTest extends \PHPUnit\Framework\TestCase
{
    private $prophecy;
    private $httpClient;
    private $requestBuilder;
    private $hydrator;
    private $feedMeNow;

    public function setup()
    {
        $this->prophet = new Prophecy\Prophet;
        $this->httpClient = $this->prophet->prophesize("Http\Client\HttpClient");
        $this->requestBuilder = $this->prophet->prophesize("FeedMeNow\RequestBuilder");
        $this->hydrator = $this->prophet->prophesize("FeedMeNow\Hydrator\Hydrator");

        $this->feedMeNow = new FeedMeNow(
            $this->httpClient->reveal(),
            $this->hydrator->reveal(),
            $this->requestBuilder->reveal()
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(FeedMeNow::class, $this->feedMeNow);
    }

    public function testCanGetProviders()
    {
        $this->assertInstanceOf('FeedMeNow\Api\Provider', $this->feedMeNow->providers());
    }

    public function testCanGetSearches()
    {
        $this->assertInstanceOf('FeedMeNow\Api\Search', $this->feedMeNow->search());
    }
}
