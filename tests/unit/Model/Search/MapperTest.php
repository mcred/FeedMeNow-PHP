<?php
namespace FeedMeNow\Tests\Model\Search;

use FeedMeNow\Model\Search\Mapper;

/**
* @covers FeedMeNow\Model\Search\Mapper
* @covers FeedMeNow\Model\Search\Search
*/
class MapperTest extends \PHPUnit\Framework\TestCase
{
    private $mapper;
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
        $this->mapper = new Mapper($this->testData);
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Mapper::class, $this->mapper);
    }

    public function testCanGetData()
    {
        $mapper = Mapper::create($this->testData);
        $actual = $mapper->getData();
        $this->assertEquals(2, count($actual));
        $this->assertInstanceOf('FeedMeNow\Model\Search\Search', $actual[0]);
    }
}
