<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Search;

/**
* @covers FeedMeNow\Model\Search
*/
class SearchTest extends \PHPUnit\Framework\TestCase
{
    private $search;
    private $testSearch;

    public function setup()
    {
        $this->testSearch = [
            'name' => 'name'
        ];
        $this->search = new Search(
            $this->testSearch['name']
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Search::class, $this->search);
    }

    public function testCanGetName()
    {
        $this->assertEquals('name', $this->search->getName());
    }
}
