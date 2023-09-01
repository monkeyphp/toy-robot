<?php

namespace ToyRobot\Command;

use ToyRobot\Robot\Robot;

class MoveCommand extends RobotCommand
{
    private function __construct(Robot $robot)
    {
        $this->setRobot($robot);
    }

    public static function new(Robot $robot): MoveCommand
    {
        return new static($robot);
    }

    public function execute(): bool
    {
        return $this->getRobot()->move();
    }
}