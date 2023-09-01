<?php

namespace ToyRobot\Command;

use ToyRobot\Robot\Robot;

class LeftCommand extends RobotCommand
{
    private function __construct(Robot $robot)
    {
        $this->setRobot($robot);
    }

    public static function new(Robot $robot): LeftCommand
    {
        return new static($robot);
    }

    public function execute(): bool
    {
        return $this->getRobot()->left();
    }
}