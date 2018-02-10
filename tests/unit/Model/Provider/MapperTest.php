<?php
namespace FeedMeNow\Tests\Model\Provider;

use FeedMeNow\Model\Provider\Mapper;

/**
* @covers FeedMeNow\Model\Provider\Mapper
* @covers FeedMeNow\Model\Restaurant
*/
class MapperTest extends \PHPUnit\Framework\TestCase
{
    private $mapper;
    private $testData;

    public function setup()
    {
        $this->testData = ['results' => [
            [
                'id' => 'name-1',
                'name' => 'name1',
                'image_url' => 'imageUrl1',
                'is_claimed' => true,
                'is_closed' => false,
                'url' => 'Url1',
                'phone' => 'Phone1',
                'display_phone' => 'displayPhone1',
                'review_count' => 11,
                'price' => '$$',
                'salesTax' => 0.079,
                'rating' => 4.5
            ],
            [
                'id' => 'name-2',
                'name' => 'name2',
                'image_url' => 'imageUrl2',
                'is_claimed' => true,
                'is_closed' => false,
                'url' => 'Url2',
                'phone' => 'Phone2',
                'display_phone' => 'displayPhone2',
                'review_count' => 11,
                'salesTax' => 0.079,
                'rating' => 4.5
            ],
        ]];
        $this->mapper = new Mapper($this->testData);
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Mapper::class, $this->mapper);
    }

    public function testCanCreate()
    {
        $actual = Mapper::create($this->testData);
        $this->assertInstanceOf(Mapper::class, $actual);
    }

    public function testCanGetData()
    {
        $mapper = Mapper::create($this->testData);
        $actual = $mapper->getData();
        $this->assertEquals(2, count($actual));
        $this->assertInstanceOf('FeedMeNow\Model\Restaurant', $actual[0]);
    }
}
