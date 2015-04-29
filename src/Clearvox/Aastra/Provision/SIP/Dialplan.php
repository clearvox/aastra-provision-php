<?php
namespace Clearvox\Aastra\Provision\SIP;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class Dialplan implements ProvisionGroupInterface
{
    /**
     * @var int
     */
    protected $timeout;

    /**
     * @var string
     */
    protected $regex;

    /**
     * @var bool|null
     */
    protected $terminator;

    public function __construct($regex = null, $timeout = null, $terminator = null)
    {
        $this->regex      = $regex;
        $this->timeout    = $timeout;
        $this->terminator = $terminator;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     * @return Dialplan
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegex()
    {
        return $this->regex;
    }

    /**
     * @param string $regex
     * @return Dialplan
     */
    public function setRegex($regex)
    {
        $this->regex = $regex;
        return $this;
    }

    /**
     * If it is using the terminator or not.
     *
     * @return bool
     */
    public function usingTerminator()
    {
        return (bool)$this->terminator;
    }

    /**
     * Use the terminator (set to true)
     * @return $this
     */
    public function useTerminator()
    {
        $this->terminator = true;
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
        $values = array();

        if(isset($this->regex)) {
            $values['sip dial plan'] = $this->regex;
        }

        if (isset($this->timeout)) {
            $values['sip digit timeout'] = $this->timeout;
        }

        if ( ! is_null($this->terminator)) {
            $values['sip dial plan terminator'] = ($this->terminator ? 1 : 0);
        }

        return $values;
    }
}