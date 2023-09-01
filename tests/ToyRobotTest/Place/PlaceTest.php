<?php

namespace ToyRobotTest\Place;

use PHPUnit\Framework\TestCase;
use ToyRobot\Command\PlaceCommand;
use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;
use ToyRobot\Table\Table;

class PlaceTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testNew()
    {
        $x = 0;
        $y = 0;
        $facing = Place::NORTH;

        $place = Place::new($x, $y, $facing);

        $this->assertInstanceOf(Place::class, $place);
    }

    public function testNewWithArray()
    {
        $place = call_user_func('ToyRobot\Place\Place::new', ...[0, 0, Place::NORTH]);
        $this->assertInstanceOf(Place::class, $place);
    }

    public function testNewWithInvalidX()
    {
        $x = -1;
        $this->expectException(\Exception::class);
        Place::new($x, 0, Place::WEST);
    }

    public function testNewWithInvalidY()
    {
        $y = -1;
        $this->expectException(\Exception::class);
        Place::new(0, $y, Place::WEST);
    }

    public function testNewWithInvalidFacing()
    {
        $facing = 'foo';
        $this->expectException(\Exception::class);
        Place::new(0, 0, $facing);
    }

    public function testToString()
    {
        $this->assertEquals(
            '0,0,NORTH',
            Place::new(0, 0, Place::NORTH)
        );
    }
}