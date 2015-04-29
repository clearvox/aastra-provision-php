<?php

use Clearvox\Aastra\Provision\SIP\General;

class GeneralTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var General
     */
    protected $general;

    public function setUp()
    {
        $this->general = new General(5, General::PROTOCOL_TCP, true, true);
    }

    public function testGetters()
    {
        $this->assertEquals(5, $this->general->getTimer());
        $this->assertTrue($this->general->usingBasicCodecs());
        $this->assertEquals(General::PROTOCOL_TCP, $this->general->getProtocol());
        $this->assertTrue($this->general->supportingOutOfBandDtmf());
    }

    public function testToArray()
    {
        $expected = [
            'sip session timer' => 5,
            'sip transport protocol' => General::PROTOCOL_TCP,
            'sip use basic codecs' => 1,
            'sip out-of-band dtmf' => 1
        ];

        $this->assertEquals($expected, $this->general->toArray());
    }
}