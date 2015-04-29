<?php

use Clearvox\Aastra\Provision\Configuration\FTP;

class FTPTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var FTP
     */
    protected $ftp;

    public function setUp()
    {
        $this->ftp = new FTP('ftp.example.com', 'username', 'password', '/ftp/path');
    }

    public function testGetters()
    {
        $this->assertEquals('ftp.example.com', $this->ftp->getServer());
        $this->assertEquals('username', $this->ftp->getUsername());
        $this->assertEquals('password', $this->ftp->getPassword());
        $this->assertEquals('/ftp/path', $this->ftp->getPath());
    }

    public function testToArray()
    {
        $this->assertEquals(
            [
                'ftp server' => 'ftp.example.com',
                'ftp username' => 'username',
                'ftp password' => 'password',
                'ftp path' => '/ftp/path'
            ],
            $this->ftp->toArray()
        );
    }
}