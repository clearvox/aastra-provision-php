<?php
namespace Clearvox\Aastra\Provision;

class CustomProvisionGroup implements ProvisionGroupInterface
{
    /**
     * @var array
     */
    protected $values = array();

    /**
     * A custom config key and value.
     *
     * @param string $key
     * @param string $value
     */
    public function add($key, $value)
    {
        $this->values[$key] = $value;
    }

    /**
     * Return all possible 'lines' in the config are
     * values in the array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->values;
    }
}