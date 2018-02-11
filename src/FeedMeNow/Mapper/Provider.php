<?php
namespace FeedMeNow\Mapper;

use FeedMeNow\Model\Restaurant;

class ProviderMapper
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
