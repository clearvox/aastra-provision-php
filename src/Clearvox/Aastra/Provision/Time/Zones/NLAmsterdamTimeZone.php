<?php
namespace Clearvox\Aastra\Provision\Time\Zones;

class NLAmsterdamTimeZone implements TimeZoneInterface
{
    /**
     * Get the TimeZone Name as defined in the Administrator guide page: A-42
     * @return string
     */
    public function getName()
    {
        return 'NL-Amsterdam';
    }

    /**
     * Get the TimeZone Code as defined in the Administrator guide page: A-42
     *
     * @return string
     */
    public function getCode()
    {
        return 'CET';
    }
}