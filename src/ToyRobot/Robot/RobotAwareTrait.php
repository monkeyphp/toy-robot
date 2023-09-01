<?php

namespace ToyRobot\Robot;

trait RobotAwareTrait
{
    /**
     * @var Robot
     */
    private $robot;

    protected function setRobot(Robot $robot): void
    {
        $this->robot = $robot;
    }

    protected function getRobot(): Robot
    {
        return $this->robot;
    }
}