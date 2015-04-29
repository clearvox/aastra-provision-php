<?php
namespace Clearvox\Aastra\Provision\Time;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class Time implements ProvisionGroupInterface
{
    protected $disable = false;

    protected $servers = array();

    public function __construct(
        $disable = false
    ) {
        $this->disable = $disable;
    }

    public function addServer($ip)
    {
        $this->servers[] = $ip;
        return $this;
    }

    public function getServers()
    {
        return $this->servers;
    }

    /**
     * Return all possible 'lines' in the config are
     * values in the array.
     *
     * @return array
     */
    public function toArray()
    {
        $values = array(
            'time server disabled' => ( $this->disable ? '1' : '0'),
        );

        foreach ($this->servers as $key => $server) {
            $values['time server' . ($key + 1)] = $server;
        }

        return $values;
    }
}