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

        $anotherMock = $this->getMock('\Clearvox\Aastra\Provision\ProvisionGroupInterface');
        $anotherMock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn(['another key' => 'anothervaluekey', 'second another key' => 'secondvalue']);


        $this->config->addGroup($this->mock);
        $this->config->addGroup($anotherMock);

        $expected  = '';
        $expected .= 'testing key: testingvalue' . PHP_EOL;
        $expected .= 'another test: anothervalue' . PHP_EOL;
        $expected .= 'another key: anothervaluekey' . PHP_EOL;
        $expected .= 'second another key: secondvalue' . PHP_EOL;

        $this->assertEquals($expected, $this->config->getContent());

    }
}