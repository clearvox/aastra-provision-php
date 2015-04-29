<?php
namespace Clearvox\Aastra\Provision\Configuration;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class TFTP implements ProvisionGroupInterface
{
    /**
     * @var string
     */
    protected $ip;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var TFTP
     */
    protected $alternate;

    public function __construct(
        $ip,
        $path,
        TFTP $alternate = null
    ) {
        $this->ip        = $ip;
        $this->path      = $path;
        $this->alternate = $alternate;
    }

    /**
     * Set the alternate TFTP server for this config.
     *
     * @param TFTP $alternate
     * @return $this
     */
    public function setAlternate(TFTP $alternate)
    {
        $this->alternate = $alternate;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
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
        $values = array(
            'tftp server' => $this->ip,
            'tftp path'   => $this->path
        );

        if (!is_null($this->alternate)) {
            $values['alternate tftp server'] = $this->alternate->getIp();
            $values['alternate tftp path']   = $this->alternate->getPath();
        }

        return $values;
    }
}