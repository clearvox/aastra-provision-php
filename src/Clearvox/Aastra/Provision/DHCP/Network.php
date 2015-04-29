<?php
namespace Clearvox\Aastra\Provision\DHCP;

class Network
{
    /**
     * @var string
     */
    protected $ip;

    /**
     * @var string
     */
    protected $subnetMask;

    /**
     * @var string
     */
    protected $defaultGateway;

    /**
     * @var string
     */
    protected $dns1;

    /**
     * @var string
     */
    protected $dns2;

    /**
     * @param string $ip
     * @param string $subnetMask
     * @param string $defaultGateway
     * @param string $dns1
     * @param string $dns2
     */
    public function __construct(
        $ip,
        $subnetMask,
        $defaultGateway,
        $dns1,
        $dns2
    ) {
        $this->ip             = $ip;
        $this->subnetMask     = $subnetMask;
        $this->defaultGateway = $defaultGateway;
        $this->dns1           = $dns1;
        $this->dns2           = $dns2;
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
    public function getSubnetMask()
    {
        return $this->subnetMask;
    }

    /**
     * @return string
     */
    public function getDefaultGateway()
    {
        return $this->defaultGateway;
    }

    /**
     * @return string
     */
    public function getDns1()
    {
        return $this->dns1;
    }

    /**
     * @return string
     */
    public function getDns2()
    {
        return $this->dns2;
    }


}