<?php
namespace FeedMeNow\Mapper;

use FeedMeNow\Model\Search;

class SearchMapper
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function create(array $data)
    {
        $return = [];
        foreach ($data as $item) {
            $return[] = new Search($item);
        }
        return new self($return);
    }

    public function getData()
    {
        return $this->data;
    }
}
