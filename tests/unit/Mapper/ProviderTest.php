<?php
namespace FeedMeNow\Tests\Mapper\Provider;

use FeedMeNow\Mapper\ProviderMapper;

/**
* @covers FeedMeNow\Mapper\ProviderMapper
* @covers FeedMeNow\Model\Restaurant
*/
class ProviderMapperTest extends \PHPUnit\Framework\TestCase
{
    private $mapper;
    private $testData;

    public function setup()
    {
        $restaurantMock = new \FeedMeNow\Mock\Restaurant;
        $this->testData = ['results' => [
            $restaurantMock->testRestaurant,
            $restaurantMock->testRestaurant
        ]];
        $this->mapper = new ProviderMapper($this->testData);
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(ProviderMapper::class, $this->mapper);
    }

    public function testCanCreate()
    {
        $actual = ProviderMapper::create($this->testData);
        $this->assertInstanceOf(ProviderMapper::class, $actual);
    }

    public function testCanGetData()
    {
        $mapper = ProviderMapper::create($this->testData);
        $actual = $mapper->getData();
        $this->assertEquals(2, count($actual));
        $this->assertInstanceOf('FeedMeNow\Model\Restaurant', $actual[0]);
    }
}
