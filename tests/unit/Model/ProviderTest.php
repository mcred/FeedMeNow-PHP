<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Provider;

/**
* @covers FeedMeNow\Model\Provider
*/
class ProviderTest extends \PHPUnit\Framework\TestCase
{
    private $provider;
    private $testProvider;

    public function setup()
    {
        $this->testProvider = [
            'name' => 'name',
            'url' => 'url',
            'delivery' => [
                'fee' => 'fee',
                'serviceFee' => 'serviceFee',
                'minimum' => 'minimum',
                'estimate' => [
                    'min' => 'min',
                    'max' => 'max',
                ]
            ]
        ];
        $this->provider = new Provider(
            $this->testProvider['name'],
            $this->testProvider['url'],
            $this->testProvider['delivery']['fee'],
            $this->testProvider['delivery']['serviceFee'],
            $this->testProvider['delivery']['minimum'],
            $this->testProvider['delivery']['estimate']['min'],
            $this->testProvider['delivery']['estimate']['max']
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

    public function testCanGetName()
    {
        $this->assertEquals('name', $this->provider->getName());
    }

    public function testCanGetUrl()
    {
        $this->assertEquals('url', $this->provider->getUrl());
    }

    public function testCanGetFee()
    {
        $this->assertEquals('fee', $this->provider->getFee());
    }

    public function testCanGetServiceFee()
    {
        $this->assertEquals('serviceFee', $this->provider->getServiceFee());
    }

    public function testCanGetMinimum()
    {
        $this->assertEquals('minimum', $this->provider->getMinimum());
    }

    public function testCanGetEstimateMin()
    {
        $this->assertEquals('min', $this->provider->getEstimateMin());
    }

    public function testCanGetEstimateMax()
    {
        $this->assertEquals('max', $this->provider->getEstimateMax());
    }
}
