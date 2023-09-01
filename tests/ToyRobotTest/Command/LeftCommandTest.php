<?php

namespace ToyRobotTest\Command;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\CommandInterface;
use ToyRobot\Command\LeftCommand;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class LeftCommandTest extends TestCase
{
    public function testNew()
    {
        $robot = Robot::new(Table::new());
        $left = LeftCommand::new($robot);

        $this->assertInstanceOf(CommandInterface::class, $left);
    }

    public function testExecuteReturnsTrue()
    {
        $robot = Robot::new(Table::new());
        $place = Place::new(0, 0, Place::NORTH);
        $robot->place($place);

        $left = LeftCommand::new($robot);

        $this->assertTrue($left->execute());
    }

    public function testExecuteReturnsFalse()
    {
        $robot = Robot::new(Table::new());
        $left = LeftCommand::new($robot);

        $this->assertFalse($left->execute());
    }
}
