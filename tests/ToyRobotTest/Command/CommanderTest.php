<?php

namespace ToyRobotTest\Command;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\Commander;
use ToyRobot\Command\FileReader;
use ToyRobot\Command\LeftCommand;
use ToyRobot\Command\MoveCommand;
use ToyRobot\Command\PlaceCommand;
use ToyRobot\Command\ReportCommand;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class CommanderTest extends TestCase
{
    public function testNew()
    {
        $this->assertInstanceOf(Commander::class, Commander::new([]));
    }

    public function testNewExampleA()
    {
        $robot = Robot::new(Table::new());

        $commander = Commander::new(FileReader::new($robot, './files/a.txt'));
        $result = $commander->execute();

        $this->assertEquals('0,1,NORTH', $result);
    }

    public function testNewExampleB()
    {
        $robot = Robot::new(Table::new());

        $commander = Commander::new(FileReader::new($robot, './files/b.txt'));
        $result = $commander->execute();

        $this->assertEquals('0,0,WEST', $result);
    }

    public function testNewExampleC()
    {
        $robot = Robot::new(Table::new());

        $commander = Commander::new(FileReader::new($robot, './files/c.txt'));
        $result = $commander->execute();

        $this->assertEquals('3,3,NORTH', $result);
    }

    public function testExecuteExampleA()
    {
        $table = Table::new();
        $robot = Robot::new($table);

        $result = Commander::new([
            PlaceCommand::new($robot, Place::new(0, 0, Place::NORTH)),
            MoveCommand::new($robot),
            ReportCommand::new($robot)
        ])->execute();

        $this->assertEquals('0,1,NORTH', $result);
    }

    public function testExecuteExampleB()
    {
        $table = Table::new();
        $robot = Robot::new($table);

        $result = Commander::new([
            PlaceCommand::new($robot, Place::new(0, 0, Place::NORTH)),
            LeftCommand::new($robot),
            ReportCommand::new($robot)
        ])->execute();

        $this->assertEquals('0,0,WEST', $result);
    }

    public function testExecuteExampleC()
    {
        $table = Table::new();
        $robot = Robot::new($table);

        $result = Commander::new([
            PlaceCommand::new($robot, Place::new(1, 2, Place::EAST)),
            MoveCommand::new($robot),
            MoveCommand::new($robot),
            LeftCommand::new($robot),
            MoveCommand::new($robot),
            ReportCommand::new($robot)
        ])->execute();

        $this->assertEquals('3,3,NORTH', $result);
    }
}