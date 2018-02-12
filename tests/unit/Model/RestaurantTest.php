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
            'rating' => 4.5,
            'coordinates' => [
                'latitude' => '33.77719',
                'longitude' => '-84.38912'
            ]
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
            $this->testRestaurant['rating'],
            $this->testRestaurant['coordinates']['latitude'],
            $this->testRestaurant['coordinates']['longitude']
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

    public function testCanGetImageUrl()
    {
        $this->assertEquals('imageUrl1', $this->restaurant->getImageUrl());
    }

    public function testCanGetIsClaimed()
    {
        $this->assertTrue($this->restaurant->getIsClaimed());
    }

    public function testCanGetIsClosed()
    {
        $this->assertFalse($this->restaurant->getIsClosed());
    }

    public function testCanGetUrl()
    {
        $this->assertEquals('Url1', $this->restaurant->getUrl());
    }

    public function testCanGetPhone()
    {
        $this->assertEquals('Phone1', $this->restaurant->getPhone());
    }

    public function testCanGetDisplayPhone()
    {
        $this->assertEquals('displayPhone1', $this->restaurant->getDisplayPhone());
    }

    public function testCanGetReviewCount()
    {
        $this->assertEquals(11, $this->restaurant->getReviewCount());
    }

    public function testCanGetPrice()
    {
        $this->assertEquals('$$', $this->restaurant->getPrice());
    }

    public function testCanGetSalesTax()
    {
        $this->assertEquals('0.079', $this->restaurant->getSalesTax());
    }

    public function testCanGetCategories()
    {
        $this->assertEquals([], $this->restaurant->getCategories());
    }

    public function testCanGetRating()
    {
        $this->assertEquals('4.5', $this->restaurant->getRating());
    }

    public function testCanGetLatitude()
    {
        $this->assertEquals('33.77719', $this->restaurant->getLatitude());
    }

    public function testCanGetLongitude()
    {
        $this->assertEquals('-84.38912', $this->restaurant->getLongitude());
    }

    public function testCanGetPhotos()
    {
        $this->assertEquals([], $this->restaurant->getPhotos());
    }

    public function testCanGetHours()
    {
        $this->assertEquals([], $this->restaurant->getHours());
    }

    public function testCanGetProviders()
    {
        $this->assertEquals([], $this->restaurant->getProviders());
    }
}
