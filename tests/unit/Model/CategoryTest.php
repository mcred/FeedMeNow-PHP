<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Category;

/**
* @covers FeedMeNow\Model\Category
*/
class CategoryTest extends \PHPUnit\Framework\TestCase
{
    private $category;
    private $testCategory;

    public function setup()
    {
        $this->testCategory = [
            'alias' => 'alias',
            'title' => 'title'
        ];
        $this->category = new Category(
            $this->testCategory['alias'],
            $this->testCategory['title']
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Category::class, $this->category);
    }

    public function testCanCreate()
    {
        $actual = Category::create($this->testCategory);
        $this->assertInstanceOf(Category::class, $actual);
    }

    public function testCanGetAlias()
    {
        $this->assertEquals('alias', $this->category->getAlias());
    }

    public function testCanGetTitle()
    {
        $this->assertEquals('title', $this->category->getTitle());
    }
}
