<?php
namespace Clearvox\Aastra\Provision\Configuration;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class FTP implements ProvisionGroupInterface
{
    /**
     * @var string
     */
    protected $server;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $path;

    public function __construct(
        $server,
        $username,
        $password,
        $path
    ) {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->path = $path;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
            'ftp server' => $this->server,
            'ftp username' => $this->username,
            'ftp password' => $this->password,
            'ftp path' => $this->path
        ];
    }
}