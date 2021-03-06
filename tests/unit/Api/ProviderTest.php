<?php
namespace FeedMeNow\Tests\Api;

use \Prophecy;
use \Prophecy\Argument;
use FeedMeNow\Api\Provider;
use FeedMeNow\Hydrator\Hydrator;

/**
* @covers FeedMeNow\Api\Provider
* @covers FeedMeNow\Api\HttpApi
* @covers FeedMeNow\Hydrator\Hydrator
*/
class ProviderTest extends \PHPUnit\Framework\TestCase
{
    private $prophecy;
    private $provider;
    private $httpClient;
    private $requestBuilder;
    private $hydrator;

    public function setup()
    {
        $this->prophet = new Prophecy\Prophet;
        $this->httpClient = $this->prophet->prophesize("Http\Client\HttpClient");
        $this->requestBuilder = $this->prophet->prophesize("FeedMeNow\RequestBuilder");

        $requestInterface = $this->prophet->prophesize("Psr\Http\Message\RequestInterface");
        $this->requestBuilder->create(Argument::any(), Argument::any(), Argument::any())
            ->willReturn($requestInterface->reveal());

        $response = $this->prophet->prophesize("GuzzleHttp\Psr7\Response");
        $stream = $this->prophet->prophesize("GuzzleHttp\Psr7\Stream");
        $restaurantMock = new \FeedMeNow\Mock\Restaurant;
        $jsonString = '{"missingProviders":[],"results":['.json_encode($restaurantMock->testRestaurant).','.json_encode($restaurantMock->testRestaurant).']}';
        $stream->__toString()->willReturn($jsonString);
        $response->getBody()->willReturn($stream->reveal());
        $this->httpClient->sendRequest(Argument::any())->willReturn($response->reveal());

        $this->hydrator = new Hydrator();
        $this->provider = new Provider(
            $this->httpClient->reveal(),
            $this->requestBuilder->reveal(),
            $this->hydrator
        );
    }

    public function testCanGet()
    {
        $address = "Atlanta, GA";
        $response = $this->provider->get($address);
        $this->assertInstanceOf("FeedMeNow\Mapper\ProviderMapper", $response);
    }
}
