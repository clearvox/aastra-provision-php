<?php

use Clearvox\Aastra\Provision\Config;

class ConfigTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    protected $mock;

    protected function setUp()
    {
        $this->config = new Config();

        $this->mock = $this->getMock('\Clearvox\Aastra\Provision\ProvisionGroupInterface');
    }

    public function testGetGroups()
    {
        $expected = [$this->mock];
        $this->config->addGroup($this->mock);

        $this->assertEquals($expected, $this->config->getGroups());
    }

    public function testGetContent()
    {
        $this->mock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn(['testing key' => 'testingvalue', 'another test' => 'anothervalue']);

        $this->config->addGroup($this->mock);

        $expected  = '';
        $expected .= 'testing key: testingvalue' . "\r\n";
        $expected .= 'another test: anothervalue';

        $this->assertEquals($expected, $this->config->getContent());

    }
}