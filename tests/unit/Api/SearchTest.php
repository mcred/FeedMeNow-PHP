<?php
namespace FeedMeNow\Tests\Api;

use \Prophecy;
use \Prophecy\Argument;
use FeedMeNow\Api\Search;
use FeedMeNow\Hydrator\Hydrator;

/**
* @covers FeedMeNow\Api\Search
* @covers FeedMeNow\Api\HttpApi
* @covers FeedMeNow\Hydrator\Hydrator
*/
class SearchTest extends \PHPUnit\Framework\TestCase
{
    private $prophecy;
    private $search;
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
        $jsonString = '["restaurant1","restaurant1"]';
        $stream->__toString()->willReturn($jsonString);
        $response->getBody()->willReturn($stream->reveal());
        $this->httpClient->sendRequest(Argument::any())->willReturn($response->reveal());

        $this->hydrator = new Hydrator();
        $this->search = new Search(
            $this->httpClient->reveal(),
            $this->requestBuilder->reveal(),
            $this->hydrator
        );
    }

    public function testCanGet()
    {
        $address = "Atlanta, GA";
        $response = $this->search->get("term", $address);
        $this->assertInstanceOf("FeedMeNow\Model\Search\Mapper", $response);
    }
}
