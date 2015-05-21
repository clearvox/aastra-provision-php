<?php
namespace Clearvox\Aastra\Provision;

class Config
{
    /**
     * @var ProvisionGroupInterface[]
     */
    protected $groups = array();

    /**
     * Add a new provision group config to this full config class.
     *
     * @param ProvisionGroupInterface $group
     * @return $this
     */
    public function addGroup(ProvisionGroupInterface $group)
    {
        $this->groups[] = $group;
        return $this;
    }

    /**
     * Get all the assigned config groups in this config.
     *
     * @return ProvisionGroupInterface[]
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Get the full output from all the provision groups, in the aastra expected
     * config format. Will use PHP_EOL to line break the entries.
     *
     * @return string
     */
    public function getContent()
    {
        $content = '';

        array_map(function(ProvisionGroupInterface $group) use (&$content) {
            $g = $group->toArray();

            $content .= implode(
                PHP_EOL,
                array_map(
                    function($v, $k) {
                        return $k . ': ' . $v;
                    },
                    $g,
                    array_keys($g)
                )
            );

            $content .= PHP_EOL;
        }, $this->groups);

        return $content;
    }
}