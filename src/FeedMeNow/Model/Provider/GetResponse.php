<?php
namespace FeedMeNow\Model\Provider;

class GetResponse
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
            $return[] = Provider::create($item);
        }
        return new self($return);
    }

    public function getData()
    {
        return $this->data;
    }
}
