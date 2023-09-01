<?php

namespace ToyRobotTest\Command;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\CommandInterface;
use ToyRobot\Command\FileReader;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class FileReaderTest extends TestCase
{
    public function testNew()
    {
        $generator = FileReader::new(
            Robot::new(Table::new()),
            './files/a.txt'
        );

        foreach ($generator as $command) {
            $this->assertInstanceOf(CommandInterface::class, $command);
        }
    }
}