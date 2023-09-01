<?php

namespace ToyRobotTest\Command;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\CommandInterface;
use ToyRobot\Command\PlaceCommand;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class PlaceCommandTest extends TestCase
{
    public function testNew()
    {
        $robot = Robot::new(Table::new());
        $place = PlaceCommand::new($robot, Place::new(0, 0, Place::NORTH));

        $this->assertInstanceOf(CommandInterface::class, $place);
    }

    public function testExecuteReturnsTrue()
    {
        $robot = Robot::new(Table::new());

        $place = PlaceCommand::new($robot, Place::new(0, 0, Place::NORTH));

        $this->assertTrue($place->execute());
    }

    public function testExecuteReturnsFalse()
    {
        $robot = Robot::new(Table::new());

        $place = PlaceCommand::new($robot, Place::new(6, 0, Place::NORTH));

        $this->assertFalse($place->execute());
    }
}