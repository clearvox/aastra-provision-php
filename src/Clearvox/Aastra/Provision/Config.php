<?php
namespace Clearvox\Aastra\Provision;

class Config
{
    /**
     * @var ProvisionGroupInterface[]
     */
    protected $groups = array();

    public function addGroup(ProvisionGroupInterface $group)
    {
        $this->groups[] = $group;
        return $this;
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function getContent()
    {
        $content = '';

        array_map(function(ProvisionGroupInterface $group) use (&$content) {
            $g = $group->toArray();

            $content .= implode(
                "\r\n",
                array_map(
                    function($v, $k) {
                        return $k . ': ' . $v;
                    },
                    $g,
                    array_keys($g)
                )
            );
        }, $this->groups);

        return $content;
    }
}