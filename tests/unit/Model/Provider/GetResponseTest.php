<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Provider\GetResponse;

/**
* @covers FeedMeNow\Model\Provider\GetResponse
*/
class GetResponseTest extends \PHPUnit\Framework\TestCase
{
    private $getResponse;
    private $testData;

    public function setup()
    {
        $this->testData = ['results' => [
            [
                'id' => 1,
                'name' => 'name',
                'price' => '$$$',
                'rating' => 'rating',
                'phone' => 'phone',
                'url' => 'url'
            ],
            [
                'id' => 2,
                'name' => 'name2',
                'price' => '$',
                'rating' => 'rating2',
                'phone' => 'phone2',
                'url' => 'url2'
            ],
        ]];
        $this->getResponse = new GetResponse($this->testData);
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(GetResponse::class, $this->getResponse);
    }

    public function testCanCreate()
    {
        $actual = GetResponse::create($this->testData);
        $this->assertInstanceOf(GetResponse::class, $actual);
    }

    public function testCanGetData()
    {
        $getResponse = GetResponse::create($this->testData);
        $actual = $getResponse->getData();
        $this->assertEquals(2, count($actual));
        $this->assertInstanceOf('FeedMeNow\Model\Provider\Provider', $actual[0]);
    }
}
