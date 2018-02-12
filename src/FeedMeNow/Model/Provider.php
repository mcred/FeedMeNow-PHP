<?php
namespace FeedMeNow\Model;

class Provider
{
    private $name;
    private $url;
    private $fee;
    private $serviceFee;
    private $minimum;
    private $estimateMin;
    private $estimateMax;

    public function __construct(
        $name,
        $url,
        $fee,
        $serviceFee,
        $minimum,
        $estimateMin,
        $estimateMax
    ) {
        $this->name = $name;
        $this->url = $url;
        $this->fee = $fee;
        $this->serviceFee = $serviceFee;
        $this->minimum = $minimum;
        $this->estimateMin = $estimateMin;
        $this->estimateMax = $estimateMax;
    }

    public static function create(array $data)
    {
        return new self(
            $data['name'],
            $data['url'],
            $data['delivery']['fee'],
            $data['delivery']['serviceFee'],
            $data['delivery']['minimum'],
            $data['delivery']['estimate']['min'],
            $data['delivery']['estimate']['max']
        );
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function getServiceFee()
    {
        return $this->serviceFee;
    }

    public function getMinimum()
    {
        return $this->minimum;
    }

    public function getEstimateMin()
    {
        return $this->estimateMin;
    }

    public function getEstimateMax()
    {
        return $this->estimateMax;
    }
}
