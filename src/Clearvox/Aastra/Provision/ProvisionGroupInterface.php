<?php
namespace Clearvox\Aastra\Provision;

interface ProvisionGroupInterface
{
    /**
     * Return all possible 'lines' in the config are
     * values in the array.
     *
     * @return array
     */
    public function toArray();
}