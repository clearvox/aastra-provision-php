<?php

use Clearvox\Aastra\Provision\DHCP\DHCP;

class DHCPTest extends PHPUnit_Framework_TestCase
{
    public function testWithoutNetworkSpecified()
    {
        $this->assertEquals(
            [
                'dhcp' => '1'
            ],
            (new DHCP())->toArray()
        );
    }

    public function testWithNetworkSpecified()
    {
        $ip             = '10.10.10.10';
        $subnetMask     = '255.255.255.0';
        $defaultGateway = '10.10.10.0';
        $dns1           = '8.8.8.8';
        $dns2           = '8.8.4.4';

        $mock = $this->getMock(
            '\Clearvox\Aastra\Provision\DHCP\Network',
            [],
            [
                $ip,
                $subnetMask,
                $defaultGateway,
                $dns1,
                $dns2
            ]
        );
        $mock
            ->expects($this->once())
            ->method('getIp')
            ->willReturn($ip);

        $mock
            ->expects($this->once())
            ->method('getSubnetMask')
            ->willReturn($subnetMask);

        $mock
            ->expects($this->once())
            ->method('getDefaultGateway')
            ->willReturn($defaultGateway);

        $mock
            ->expects($this->once())
            ->method('getDns1')
            ->willReturn($dns1);

        $mock
            ->expects($this->once())
            ->method('getDns2')
            ->willReturn($dns2);

        $dhcp = new DHCP($mock);

        $this->assertEquals(
            [
                'dhcp'            => '0',
                'ip'              => $ip,
                'subnet mask'     => $subnetMask,
                'default gateway' => $defaultGateway,
                'dns1'            => $dns1,
                'dns2'            => $dns2
            ],
            $dhcp->toArray()
        );
    }
}