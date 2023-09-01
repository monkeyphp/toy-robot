<?php

namespace ToyRobotTest\Command;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\CommandInterface;
use ToyRobot\Command\ReportCommand;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class ReportCommandTest extends TestCase
{
    public function testNew()
    {
        $robot = Robot::new(Table::new());
        $report = ReportCommand::new($robot);

        $this->assertInstanceOf(CommandInterface::class, $report);
    }

    public function testExecuteReturnsString()
    {
        $robot = Robot::new(Table::new());
        $place = Place::new(0, 0, Place::NORTH);
        $robot->place($place);

        $report = ReportCommand::new($robot);

        $this->assertIsString($report->execute());
    }

    public function testExecuteReturnsNull()
    {
        $robot = Robot::new(Table::new());
        $command = ReportCommand::new($robot);

        $this->assertNull($command->execute());
    }
}