<?php

use Clearvox\Aastra\Provision\CustomProvisionGroup;

class CustomProvisionGroupTest extends PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
        $custom = new CustomProvisionGroup();
        $custom->add('custom key', 'custom value');

        $expected = [
            'custom key' => 'custom value'
        ];

        $this->assertEquals($expected, $custom->toArray());
    }
}