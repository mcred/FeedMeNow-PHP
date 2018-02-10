<?php
namespace FeedMeNow\Model;

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
    private $categories = [];
    private $coordinates = [];
    private $photos = [];
    private $hours = [];
    private $transactions = [];
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
        $categories = [],
        $coordinates = [],
        $photos = [],
        $hours = [],
        $transactions = [],
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
        $this->categories = $categories;
        $this->coordinates = $coordinates;
        $this->photos = $photos;
        $this->hours = $hours;
        $this->transactions = $transactions;
        $this->providers = $providers;
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
            $data['rating']
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

    public function getCoordinates()
    {
        return $this->coordinates;
    }

    public function getPhotos()
    {
        return $this->photos;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function getTransactions()
    {
        return $this->transactions;
    }

    public function getProviders()
    {
        return $this->providers;
    }
}
