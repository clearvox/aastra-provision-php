<?php
namespace Clearvox\Aastra\Provision\DHCP;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class DHCP implements ProvisionGroupInterface
{
    /**
     * @var Network|null
     */
    protected $network = null;

    /**
     * Supply a network if you are not using DHCP.
     *
     * @param Network $network
     */
    public function __construct(Network $network = null)
    {
        $this->network = $network;
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

        if (is_null($this->network)) {
            $values['dhcp'] = '1';
        } else {
            $values['dhcp']            = '0';
            $values['ip']              = $this->network->getIp();
            $values['subnet mask']     = $this->network->getSubnetMask();
            $values['default gateway'] = $this->network->getDefaultGateway();
            $values['dns1']            = $this->network->getDns1();
            $values['dns2']            = $this->network->getDns2();
        }

        return $values;
    }
}