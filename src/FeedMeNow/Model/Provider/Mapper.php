<?php
namespace FeedMeNow\Model\Provider;

use FeedMeNow\Model\Restaurant;

class Mapper
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function create(array $data)
    {
        $return = [];
        foreach ($data['results'] as $item) {
            $return[] = Restaurant::create($item);
        }
        return new self($return);
    }

    public function getData()
    {
        return $this->data;
    }
}
