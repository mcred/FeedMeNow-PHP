<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Address;

/**
* @covers FeedMeNow\Model\Address
*/
class AddressTest extends \PHPUnit\Framework\TestCase
{
    private $address;
    private $testAddress;

    public function setup()
    {
        $this->testAddress = [
            'address1' => 'address1',
            'address2' => 'address2',
            'address3' => 'address3',
            'city' => 'city',
            'zip_code' => 'zipCode',
            'country' => 'country',
            'state' => 'state',
            'cross_streets' => 'crossStreets'
        ];
        $this->address = new Address(
            $this->testAddress['address1'],
            $this->testAddress['address2'],
            $this->testAddress['address3'],
            $this->testAddress['city'],
            $this->testAddress['zip_code'],
            $this->testAddress['country'],
            $this->testAddress['state'],
            $this->testAddress['cross_streets']
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Address::class, $this->address);
    }

    public function testCanCreate()
    {
        $actual = Address::create($this->testAddress);
        $this->assertInstanceOf(Address::class, $actual);
    }

    public function testCanGetaddress1()
    {
        $this->assertEquals('address1', $this->address->getAddress1());
    }
    public function testCanGetaddress2()
    {
        $this->assertEquals('address2', $this->address->getAddress2());
    }
    public function testCanGetaddress3()
    {
        $this->assertEquals('address3', $this->address->getAddress3());
    }
    public function testCanGetcity()
    {
        $this->assertEquals('city', $this->address->getCity());
    }
    public function testCanGetzipCode()
    {
        $this->assertEquals('zipCode', $this->address->getZipCode());
    }
    public function testCanGetcountry()
    {
        $this->assertEquals('country', $this->address->getCountry());
    }
    public function testCanGetstate()
    {
        $this->assertEquals('state', $this->address->getState());
    }
    public function testCanGetcrossStreets()
    {
        $this->assertEquals('crossStreets', $this->address->getCrossStreets());
    }
}
