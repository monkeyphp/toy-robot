<?php

use ToyRobot\Command\Commander;
use ToyRobot\Command\FileReader;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

require __DIR__ . '/vendor/autoload.php';


// A
$filename = './files/a.txt';
$robot = Robot::new(Table::new());
$commander = Commander::new(FileReader::new($robot, $filename));

$result = $commander->execute();
print($result . PHP_EOL);

// B
$filename = './files/b.txt';
$robot = Robot::new(Table::new());
$commander = Commander::new(FileReader::new($robot, $filename));

$result = $commander->execute();
print($result . PHP_EOL);

// C
$filename = './files/c.txt';
$robot = Robot::new(Table::new());
$commander = Commander::new(FileReader::new($robot, $filename));

$result = $commander->execute();
print($result . PHP_EOL);


// D
$filename = './files/d.txt';
$robot = Robot::new(Table::new());
$commander = Commander::new(FileReader::new($robot, $filename));

$result = $commander->execute();
print($result . PHP_EOL);
