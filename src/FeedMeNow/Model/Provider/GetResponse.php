<?php
namespace FeedMeNow\Model\Provider;

class GetResponse
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function create(array $data)
    {
        $return = [];
        foreach ($data['results'] as $item) {
            var_dump($item);
            $return[] = Provider::create($item);
        }
        return new self($return);
    }

    public function getData()
    {
        return $this->data;
    }
}
