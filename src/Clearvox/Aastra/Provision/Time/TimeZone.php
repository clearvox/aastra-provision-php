<?php
namespace Clearvox\Aastra\Provision\Time;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;
use Clearvox\Aastra\Provision\Time\Zones\TimeZoneInterface;

class TimeZone implements ProvisionGroupInterface
{
    protected $timeZone;

    public function __construct(TimeZoneInterface $timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * Return all possible 'lines' in the config are
     * values in the array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'time zone name' => $this->timeZone->getName()
        ];
    }
}