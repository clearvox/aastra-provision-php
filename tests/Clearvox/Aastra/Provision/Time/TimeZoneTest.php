<?php

use Clearvox\Aastra\Provision\Time\TimeZone;
use Clearvox\Aastra\Provision\Time\Zones\GBLondonTimeZone;

class TimeZoneTest extends PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        $gbLondon = new GBLondonTimeZone;
        $timeZone = new TimeZone($gbLondon);
        $this->assertEquals($gbLondon, $timeZone->getTimeZone());
    }

    public function testToArray()
    {
        $gbLondon = new GBLondonTimeZone;
        $timeZone = new TimeZone(new GBLondonTimeZone);

        $expected = [
            'time zone name' => $gbLondon->getName()
        ];

        $this->assertEquals($expected, $timeZone->toArray());
    }
}