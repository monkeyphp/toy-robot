<?php

namespace ToyRobotTest\Robot;

use PHPUnit\Framework\TestCase;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class RobotTest extends TestCase
{
    public function testNew()
    {
        $table = Table::new();
        $robot = Robot::new($table);

        $this->assertInstanceOf(Robot::class, $robot);
    }

    public function testReport()
    {
        $x = 0;
        $y = 0;
        $facing = Place::NORTH;

        $table = Table::new();
        $robot = Robot::new($table);
        $place = Place::new($x, $y, $facing);

        $robot->place($place);

        $this->assertEquals($place, $robot->report());
    }

    public function testPlaceReturnsTrue()
    {
        $table = Table::new();
        $robot = Robot::new($table);
        $place = Place::new(0, 0, Place::NORTH);

        $this->assertTrue($robot->place($place));
    }

    public function testPlaceWithInvalidXReturnsFalse()
    {
        $table = Table::new();
        $robot = Robot::new($table);
        $place = Place::new($table->getWidth() + 1, 0, Place::NORTH);

        $this->assertFalse($robot->place($place));
    }

    public function testPlaceWithInvalidYReturnsFalse()
    {
        $table = Table::new();
        $robot = Robot::new($table);
        $place = Place::new(0,$table->getHeight() + 1, Place::NORTH);

        $this->assertFalse($robot->place($place));
    }

    // @link https://docs.phpunit.de/en/8.5/writing-tests-for-phpunit.html#data-providers
    public function rightTestProvider ()
    {
        return [
            [Place::NORTH, Place::EAST],
            [Place::EAST, Place::SOUTH],
            [Place::SOUTH, Place::WEST],
            [Place::WEST, Place::NORTH],
        ];
    }

    /**
     * @dataProvider rightTestProvider
     * @throws \Exception
     * @return void
     */
    public function testRight($facing, $expected)
    {
        $table = Table::new();
        $robot = Robot::new($table);
        $place = Place::new(0, 0, $facing);

        $robot->place($place);

        $this->assertEquals(
            $place,
            $robot->report()
        );

        $robot->right();

        $this->assertEquals(
            sprintf('0 0 %s', $expected),
            $robot->report()
        );
    }

    public function leftTestProvider ()
    {
        return [
            [Place::NORTH, Place::WEST],
            [Place::WEST, Place::SOUTH],
            [Place::SOUTH, Place::EAST],
            [Place::EAST, Place::NORTH],
        ];
    }

    /**
     * @dataProvider leftTestProvider
     *
     * @param $facing
     * @param $expected
     *
     * @throws \Exception
     * @return void
     */
    public function testLeft($facing, $expected)
    {
        $table = Table::new();
        $robot = Robot::new($table);
        $place = Place::new(0, 0, $facing);


        $robot->place($place);

        $this->assertEquals(
            $place,
            $robot->report()
        );

        $robot->left();

        $this->assertEquals(
            sprintf('0 0 %s', $expected),
            $robot->report()
        );
    }
}
