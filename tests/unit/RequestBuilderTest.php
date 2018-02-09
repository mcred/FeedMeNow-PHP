<?php
namespace FeedMeNow\Tests;

use \Prophecy;
use FeedMeNow\RequestBuilder;

/**
* @covers FeedMeNow\RequestBuilder
*/
class RequestBuilderTest extends \PHPUnit\Framework\TestCase
{
    private $requestBuilder;

    public function setup()
    {
        $this->requestBuilder = new RequestBuilder();
    }

    public function testCanCreate()
    {
        $actual = $this->requestBuilder->create('GET', 'http://testurl.com');
        $this->assertInstanceOf('GuzzleHttp\Psr7\Request', $actual);
    }
}
