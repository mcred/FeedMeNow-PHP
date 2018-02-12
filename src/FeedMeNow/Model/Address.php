<?php
namespace FeedMeNow\Model;

class Address
{
    private $address1;
    private $address2;
    private $address3;
    private $city;
    private $zipCode;
    private $country;
    private $state;
    private $crossStreets;

    public function __construct(
        $address1,
        $address2,
        $address3,
        $city,
        $zipCode,
        $country,
        $state,
        $crossStreets
    ) {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->country = $country;
        $this->state = $state;
        $this->crossStreets = $crossStreets;
    }

    public static function create(array $data)
    {
        return new self(
            $data['address1'],
            $data['address2'],
            $data['address3'],
            $data['city'],
            $data['zip_code'],
            $data['country'],
            $data['state'],
            $data['cross_streets']
        );
    }

    public function getAddress1()
    {
        return $this->address1;
    }

    public function getAddress2()
    {
        return $this->address2;
    }

    public function getAddress3()
    {
        return $this->address3;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCrossStreets()
    {
        return $this->crossStreets;
    }
}
