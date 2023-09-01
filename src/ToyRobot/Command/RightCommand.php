<?php

namespace ToyRobot\Command;

use ToyRobot\Robot\Robot;

class RightCommand extends RobotCommand
{
    private function __construct(Robot $robot)
    {
        $this->setRobot($robot);
    }

    public static function new(Robot $robot): RightCommand
    {
        return new static($robot);
    }

    public function execute(): bool
    {
        return $this->getRobot()->right();
    }
}