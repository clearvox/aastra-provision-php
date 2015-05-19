<?php
namespace Clearvox\Aastra\Provision\Time\Zones;

/**
 * Use this class if the specific TimeZone class is missing.
 *
 * @author Leon Rowland <leon@rowland.nl>
 */
class GenericTimeZone implements TimeZoneInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $code;

    /**
     * Sets a custom TimeZone Name and TimeZone Code to be used incase the
     * specific class is missing.
     *
     * @param string $name
     * @param string $code
     */
    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * Get the TimeZone Name as defined in the Administrator guide page: A-42
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the TimeZone Code as defined in the Administrator guide page: A-42
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}