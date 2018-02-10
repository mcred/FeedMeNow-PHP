<?php
namespace FeedMeNow\Tests\Model\Search;

use FeedMeNow\Model\Search\GetResponse;

/**
* @covers FeedMeNow\Model\Search\GetResponse
* @covers FeedMeNow\Model\Search\Search
*/
class GetResponseTest extends \PHPUnit\Framework\TestCase
{
    private $getResponse;
    private $testData;

    public function setup()
    {
        $this->testData = [
            [
                'name' => 'name'
            ],
            [
                'name' => 'name2'
            ],
        ];
        $this->getResponse = new GetResponse($this->testData);
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(GetResponse::class, $this->getResponse);
    }

    public function testCanGetData()
    {
        $getResponse = GetResponse::create($this->testData);
        $actual = $getResponse->getData();
        $this->assertEquals(2, count($actual));
        $this->assertInstanceOf('FeedMeNow\Model\Search\Search', $actual[0]);
    }
}
