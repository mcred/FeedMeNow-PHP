<?php
namespace FeedMeNow\Model;

class Hour
{
    private $isOverNight;
    private $start;
    private $end;
    private $day;

    public function __construct(
        $isOverNight,
        $start,
        $end,
        $day
    ) {
        $this->isOverNight = $isOverNight;
        $this->start = $start;
        $this->end = $end;
        $this->day = jddayofweek($day, 1);
    }

    public static function create(array $data)
    {
        return new self(
            $data['is_overnight'],
            $data['start'],
            $data['end'],
            $data['day']
        );
    }

    public function getIsOverNight()
    {
        return $this->isOverNight;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getDay()
    {
        return $this->day;
    }
}
