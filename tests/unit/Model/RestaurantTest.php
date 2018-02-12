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
        $restaurantMock = new \FeedMeNow\Mock\Restaurant;
        $this->testRestaurant = $restaurantMock->testRestaurant;
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
            $this->testRestaurant['coordinates']['longitude'],
            $this->testRestaurant['categories'],
            $this->testRestaurant['photos'],
            $this->testRestaurant['hours'],
            $this->testRestaurant['providers']
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Restaurant::class, $this->restaurant);
    }

    public function testCanCreate()
    {
        unset($this->testRestaurant['price']);
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
        $actual = $this->restaurant->getCategories();
        $this->assertInstanceOf('FeedMeNow\Model\Category', $actual[0]);
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
        $actual = $this->restaurant->getPhotos();
        $this->assertEquals('https://s3-media1.fl.yelpcdn.com/bphoto/SpaGdVA-QwFCRmc7v_cjTg/o.jpg', $actual[0]);
    }

    public function testCanGetHours()
    {
        $actual = $this->restaurant->getHours();
        $this->assertInstanceOf('FeedMeNow\Model\Hour', $actual[0]);
    }

    public function testCanGetProviders()
    {
        $actual = $this->restaurant->getProviders();
        $this->assertInstanceOf('FeedMeNow\Model\Provider', $actual[0]);
    }
}
