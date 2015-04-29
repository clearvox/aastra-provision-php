<?php
namespace Clearvox\Aastra\Provision\Configuration;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class HTTP implements ProvisionGroupInterface
{
    /**
     * @var string
     */
    protected $server;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var integer
     */
    protected $port = 80;

    /**
     * @var bool
     */
    protected $secure = false;

    public function __construct(
        $server,
        $path,
        $port = 80,
        $secure = false
    ) {
        $this->server = $server;
        $this->path   = $path;
        $this->port   = $port;
        $this->secure = $secure;
    }

    /**
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param integer $port
     * @return $this
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSecure()
    {
        return $this->secure;
    }

    public function makeSecure()
    {
        $this->secure = true;
        return $this;
    }

    /**
     * Return all possible 'lines' in the config are
     * values in the array.
     *
     * @return array
     */
    public function toArray()
    {
        $prefix = ($this->secure ? 'https' : 'http');

        return [
            "$prefix server" => $this->server,
            "$prefix path" => $this->path,
            "$prefix port" => $this->port
        ];
    }
}