<?php

use Clearvox\Aastra\Provision\Time\Time;

class TimeTest extends PHPUnit_Framework_TestCase
{
    public function testDisabled()
    {
        $time = new Time(true);

        $this->assertEquals(
            [
                'time server disabled' => 1
            ],
            $time->toArray()
        );
    }

    public function testWithMultipleServers()
    {
        $time = new Time();

        $time
            ->addServer('server.weather.org')
            ->addServer('anotherserver.weather.org');

        $this->assertEquals(
            [
                'time server disabled' => 0,
                'time server1' => 'server.weather.org',
                'time server2' => 'anotherserver.weather.org'
            ],
            $time->toArray()
        );
    }
}