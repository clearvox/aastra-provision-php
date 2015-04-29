<?php
namespace Clearvox\Aastra\Provision\SIP;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class General implements ProvisionGroupInterface
{
    protected $timer;

    protected $protocol;

    const PROTOCOL_BOTH = 0;
    const PROTOCOL_UDP  = 1;
    const PROTOCOL_TCP  = 2;

    protected $basicCodecs;

    protected $outOfBandDtmf;

    public function __construct($timer = null, $protocol = null, $basicCodecs = null, $outOfBandDtmf = null)
    {
        $this->timer         = $timer;
        $this->protocol      = $protocol;
        $this->basicCodecs   = $basicCodecs;
        $this->outOfBandDtmf = $outOfBandDtmf;
    }

    /**
     * @return null
     */
    public function getTimer()
    {
        return $this->timer;
    }

    /**
     * @param null $timer
     * @return General
     */
    public function setTimer($timer)
    {
        $this->timer = $timer;
        return $this;
    }

    /**
     * @return null
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param null $protocol
     * @return General
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return null
     */
    public function useBasicCodecs()
    {
        $this->basicCodecs = true;
        return $this;
    }

    public function usingBasicCodecs()
    {
        return (boolean)$this->basicCodecs;
    }

    public function disableOutOfBandDtmf()
    {
        $this->outOfBandDtmf = false;
        return $this;
    }

    /**
     * @return boolean
     */
    public function supportingOutOfBandDtmf()
    {
        return (is_null($this->outOfBandDtmf) ? true : (bool)$this->outOfBandDtmf);
    }

    /**
     * @param null $outOfBandDtmf
     * @return General
     */
    public function setOutOfBandDtmf($outOfBandDtmf)
    {
        $this->outOfBandDtmf = $outOfBandDtmf;
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

        if (isset($this->timer)) {
            $values['sip session timer'] = $this->timer;
        }

        if (isset($this->protocol)) {
            $values['sip transport protocol'] = $this->protocol;
        }

        if ( ! is_null($this->basicCodecs)) {
            $values['sip use basic codecs'] = ((bool) $this->basicCodecs ? 1 : 0);
        }

        if ( ! is_null($this->outOfBandDtmf)) {
            $values['sip out-of-band dtmf'] = ((bool) $this->outOfBandDtmf ? 1 : 0);
        }

        return $values;
    }
}