<?php

use Clearvox\Aastra\Provision\Configuration\TFTP;

class TFTPTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var TFTP
     */
    protected $tftp;

    protected function setUp()
    {
        $this->tftp = new TFTP('10.10.10.10', '/example/path');
    }

    public function testGetters()
    {
        $this->assertEquals('10.10.10.10', $this->tftp->getIp());
        $this->assertEquals('/example/path', $this->tftp->getPath());
    }

    public function testToArray()
    {
        $this->assertEquals(
            [
                'tftp server' => '10.10.10.10',
                'tftp path' => '/example/path'
            ],
            $this->tftp->toArray()
        );
    }

    public function testToArrayWithAlternative()
    {
        $alternate = new TFTP('12.12.12.12', '/another/path');
        $this->tftp->setAlternate($alternate);

        $this->assertEquals(
            [
                'tftp server' => '10.10.10.10',
                'tftp path' => '/example/path',
                'alternate tftp server' => '12.12.12.12',
                'alternate tftp path' => '/another/path'
            ],
            $this->tftp->toArray()
        );
    }
}