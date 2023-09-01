<?php

namespace ToyRobot\Command;

use ToyRobot\Robot\Robot;

class ReportCommand extends RobotCommand
{
    private function __construct(Robot $robot)
    {
        $this->setRobot($robot);
    }

    public static function new(Robot $robot): ReportCommand
    {
        return new static($robot);
    }

    public function execute(): ?string
    {
        return $this->getRobot()->report();
    }
}