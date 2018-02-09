<?php
namespace FeedMeNow\Model\Provider;

class Provider
{
    private $id;
    private $name;
    private $price;
    private $rating;
    private $phone;
    private $url;

    public function __construct($id, $name, $price, $rating, $phone, $url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->rating = $rating;
        $this->phone = $phone;
        $this->url = $url;
    }

    public static function create(array $data)
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['price'] ?: '',
            $data['rating'],
            $data['phone'],
            $data['url']
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getUrl()
    {
        return $this->url;
    }
}
