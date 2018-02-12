<?php
namespace FeedMeNow\Tests\Model;

use FeedMeNow\Model\Hour;

/**
* @covers FeedMeNow\Model\Hour
*/
class HourTest extends \PHPUnit\Framework\TestCase
{
    private $hour;
    private $testHour;

    public function setup()
    {
        $this->testHour = [
            'is_overnight' => false,
            'start' => "1100",
            'end' => "2200",
            'day' => 0
        ];
        $this->hour = new Hour(
            $this->testHour['is_overnight'],
            $this->testHour['start'],
            $this->testHour['end'],
            $this->testHour['day']
        );
    }

    public function testCanInstantiate()
    {
        $this->assertInstanceOf(Hour::class, $this->hour);
    }

    public function testCanCreate()
    {
        $actual = Hour::create($this->testHour);
        $this->assertInstanceOf(Hour::class, $actual);
    }

    public function testCanGetIsOverNight()
    {
        $this->assertFalse($this->hour->getIsOverNight());
    }
    public function testCanGetStart()
    {
        $this->assertEquals('1100', $this->hour->getStart());
    }
    public function testCanGetEnd()
    {
        $this->assertEquals('2200', $this->hour->getEnd());
    }
    public function testCanGetDay()
    {
        $this->assertEquals('Monday', $this->hour->getDay());
    }
}
