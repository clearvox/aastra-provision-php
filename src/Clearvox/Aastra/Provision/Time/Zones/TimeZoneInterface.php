<?php
namespace Clearvox\Aastra\Provision\Time\Zones;

interface TimeZoneInterface
{
    /**
     * Get the TimeZone Name as defined in the Administrator guide page: A-42
     * @return string
     */
    public function getName();

    /**
     * Get the TimeZone Code as defined in the Administrator guide page: A-42
     *
     * @return string
     */
    public function getCode();
}