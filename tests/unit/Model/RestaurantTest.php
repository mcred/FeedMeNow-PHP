<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Restaurant;

/**
* @covers FeedMeNow\Model\Restaurant
*/
class RestaurantTest extends \PHPUnit\Framework\TestCase
{
    private $restaurant;
    private $testRestaurant;

    public function setup()
    {
        $this->testRestaurant = [
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
        ];
        $this->restaurant = new Restaurant(
            $this->testRestaurant['id'],
            $this->testRestaurant['name'],
            $this->testRestaurant['image_url'],
            $this->testRestaurant['is_claimed'],
            $this->testRestaurant['is_closed'],
            $this->testRestaurant['url'],
            $this->testRestaurant['phone'],
            $this->testRestaurant['display_phone'],
            $this->testRestaurant['review_count'],
            $this->testRestaurant['price'],
            $this->testRestaurant['salesTax'],
            $this->testRestaurant['rating']
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Restaurant::class, $this->restaurant);
    }

    public function testCanCreate()
    {
        $actual = Restaurant::create($this->testRestaurant);
        $this->assertInstanceOf(Restaurant::class, $actual);
    }

    public function testCanGetId()
    {
        $this->assertEquals('name-1', $this->restaurant->getId());
    }

    public function testCanGetName()
    {
        $this->assertEquals('name1', $this->restaurant->getName());
    }

    public function testCanGetPrice()
    {
        $this->assertEquals('$$', $this->restaurant->getPrice());
    }

    public function testCanGetRating()
    {
        $this->assertEquals(4.5, $this->restaurant->getRating());
    }

    public function testCanGetPhone()
    {
        $this->assertEquals('Phone1', $this->restaurant->getPhone());
    }

    public function testCanGetUrl()
    {
        $this->assertEquals('Url1', $this->restaurant->getUrl());
    }
}
