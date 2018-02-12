<?php
namespace FeedMeNow\Model;

use FeedMeNow\Model\Category;
use FeedMeNow\Model\Location;
use FeedMeNow\Model\Provider;
use FeedMeNow\Model\Hour;

class Restaurant
{
    private $id;
    private $name;
    private $imageUrl;
    private $isClaimed;
    private $isClosed;
    private $url;
    private $phone;
    private $displayPhone;
    private $reviewCount;
    private $price;
    private $salesTax;
    private $rating;
    private $latitude;
    private $longitude;
    private $categories = [];
    private $photos = [];
    private $hours = [];
    private $providers = [];

    public function __construct(
        $id,
        $name,
        $imageUrl,
        $isClaimed,
        $isClosed,
        $url,
        $phone,
        $displayPhone,
        $reviewCount,
        $price,
        $salesTax,
        $rating,
        $latitude,
        $longitude,
        $categories = [],
        $photos = [],
        $hours = [],
        $providers = []
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->isClaimed = $isClaimed;
        $this->isClosed = $isClosed;
        $this->url = $url;
        $this->phone = $phone;
        $this->displayPhone = $displayPhone;
        $this->reviewCount = $reviewCount;
        $this->price = $price;
        $this->salesTax = $salesTax;
        $this->rating = $rating;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->categories = $this->setCategories($categories);
        $this->photos = $photos;
        $this->hours = (is_array($hours) ? $this->setHours($hours) : []);
        $this->providers = $this->setProviders($providers);
    }

    public static function create(array $data)
    {
        if (!array_key_exists('price', $data)) {
            $data['price'] = '';
        }
        return new self(
            $data['id'],
            $data['name'],
            $data['image_url'],
            $data['is_claimed'],
            $data['is_closed'],
            $data['url'],
            $data['phone'],
            $data['display_phone'],
            $data['review_count'],
            $data['price'],
            $data['salesTax'],
            $data['rating'],
            $data['coordinates']['latitude'],
            $data['coordinates']['longitude'],
            $data['categories'],
            $data['photos'],
            $data['hours'],
            $data['providers']
        );
    }

    private function setCategories(array $categories)
    {
        $return = [];
        foreach ($categories as $category) {
            $return[] = Category::create($category);
        }
        return $return;
    }

    private function setProviders(array $providers)
    {
        $return = [];
        foreach ($providers as $provider) {
            $return[] = Provider::create($provider);
        }
        return $return;
    }

    private function setHours(array $hours)
    {
        $return = [];
        foreach ($hours['open'] as $hour) {
            $return[] = Hour::create($hour);
        }
        return $return;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getIsClaimed()
    {
        return $this->isClaimed;
    }

    public function getIsClosed()
    {
        return $this->isClosed;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getDisplayPhone()
    {
        return $this->displayPhone;
    }

    public function getReviewCount()
    {
        return $this->reviewCount;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSalesTax()
    {
        return $this->salesTax;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getPhotos()
    {
        return $this->photos;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function getProviders()
    {
        return $this->providers;
    }
}
