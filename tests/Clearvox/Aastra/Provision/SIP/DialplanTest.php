<?php

use Clearvox\Aastra\Provision\SIP\Dialplan;

class DialplanTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Dialplan
     */
    protected $dialplan;

    public function setUp()
    {
        $this->dialplan = new Dialplan('x', 5, true);
    }

    public function testGetters()
    {

        $this->assertEquals('x', $this->dialplan->getRegex());
        $this->assertEquals(5, $this->dialplan->getTimeout());
        $this->assertTrue($this->dialplan->usingTerminator());
    }

    public function testToArray()
    {
        $expected = [
            'sip digit timeout' => 5,
            'sip dial plan' => 'x',
            'sip dial plan terminator' => 1
        ];

        $this->assertEquals($expected, $this->dialplan->toArray());
    }

}