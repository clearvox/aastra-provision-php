<?php


use Clearvox\Aastra\Provision\DHCP\Network;

class NetworkTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Network
     */
    protected $network;

    public function setUp()
    {
        $this->network = new Network('10.10.10.10', '255.255.255.0', '10.10.10.0', '8.8.8.8', '8.8.4.4');
    }

    public function testGetters()
    {
        $this->assertEquals('10.10.10.10', $this->network->getIp());
        $this->assertEquals('255.255.255.0', $this->network->getSubnetMask());
        $this->assertEquals('10.10.10.0', $this->network->getDefaultGateway());
        $this->assertEquals('8.8.8.8', $this->network->getDns1());
        $this->assertEquals('8.8.4.4', $this->network->getDns2());
    }
}