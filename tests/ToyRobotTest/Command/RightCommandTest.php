<?php

namespace ToyRobotTest\Command;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\CommandInterface;
use ToyRobot\Command\RightCommand;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class RightCommandTest extends TestCase
{
    public function testNew()
    {
        $robot = Robot::new(Table::new());
        $right = RightCommand::new($robot);

        $this->assertInstanceOf(CommandInterface::class, $right);
    }

    public function testExecuteReturnsTrue()
    {
        $robot = Robot::new(Table::new());
        $place = Place::new(0, 0, Place::NORTH);
        $robot->place($place);

        $right = RightCommand::new($robot);

        $this->assertTrue($right->execute());
    }

    public function testExecuteReturnsFalse()
    {
        $robot = Robot::new(Table::new());
        $right = RightCommand::new($robot);

        $this->assertFalse($right->execute());
    }
}