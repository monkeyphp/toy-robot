<?php

namespace ToyRobotTest\Command;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\CommandInterface;
use ToyRobot\Command\MoveCommand;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class MoveCommandTest extends TestCase
{
    public function testNew()
    {
        $robot = Robot::new(Table::new());
        $move = MoveCommand::new($robot);

        $this->assertInstanceOf(CommandInterface::class, $move);
    }

    public function testExecuteReturnsTrue()
    {
        $robot = Robot::new(Table::new());
        $place = Place::new(0, 0, Place::NORTH);
        $robot->place($place);

        $move = MoveCommand::new($robot);

        $this->assertTrue($move->execute());
    }

    public function testExecuteReturnsFalse()
    {
        $robot = Robot::new(Table::new());
        $move = MoveCommand::new($robot);

        $this->assertFalse($move->execute());
    }
}
