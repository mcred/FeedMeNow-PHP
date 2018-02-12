<?php
namespace FeedMeNow\Tests\Mapper\Search;

use FeedMeNow\Mapper\SearchMapper;

/**
* @covers FeedMeNow\Mapper\SearchMapper
* @covers FeedMeNow\Model\Search
*/
class SearchMapperTest extends \PHPUnit\Framework\TestCase
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
        $this->mapper = new SearchMapper($this->testData);
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(SearchMapper::class, $this->mapper);
    }

    public function testCanGetData()
    {
        $mapper = SearchMapper::create($this->testData);
        $actual = $mapper->getData();
        $this->assertEquals(2, count($actual));
        $this->assertInstanceOf('FeedMeNow\Model\Search', $actual[0]);
    }
}
