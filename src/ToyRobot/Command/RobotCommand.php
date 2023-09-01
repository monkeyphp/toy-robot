<?php

namespace ToyRobot\Command;

use ToyRobot\Robot\RobotAwareTrait;

abstract class RobotCommand implements CommandInterface
{
    use RobotAwareTrait;
}