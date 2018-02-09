<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Provider\Provider;

/**
* @covers FeedMeNow\Model\Provider\Provider
*/
class ProviderTest extends \PHPUnit\Framework\TestCase
{
    private $provider;
    private $testProvider;

    public function setup()
    {
        $this->testProvider = [
            'id' => 1,
            'name' => 'name',
            'price' => '$$$',
            'rating' => 'rating',
            'phone' => 'phone',
            'url' => 'url'
        ];
        $this->provider = new Provider(
            $this->testProvider['id'],
            $this->testProvider['name'],
            $this->testProvider['price'],
            $this->testProvider['rating'],
            $this->testProvider['phone'],
            $this->testProvider['url']
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Provider::class, $this->provider);
    }

    public function testCanCreate()
    {
        $actual = Provider::create($this->testProvider);
        $this->assertInstanceOf(Provider::class, $actual);
    }

    public function testCanGetId()
    {
        $this->assertEquals(1, $this->provider->getId());
    }

    public function testCanGetName()
    {
        $this->assertEquals('name', $this->provider->getName());
    }

    public function testCanGetPrice()
    {
        $this->assertEquals('$$$', $this->provider->getPrice());
    }

    public function testCanGetRating()
    {
        $this->assertEquals('rating', $this->provider->getRating());
    }

    public function testCanGetPhone()
    {
        $this->assertEquals('phone', $this->provider->getPhone());
    }

    public function testCanGetUrl()
    {
        $this->assertEquals('url', $this->provider->getUrl());
    }
}
