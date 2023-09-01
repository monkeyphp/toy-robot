<?php

namespace ToyRobotTest\Table;

use PHPUnit\Framework\TestCase;
use ToyRobot\Table\Table;

class TableTest extends TestCase
{
    public function testNewWithDefaultParameters()
    {
        $table = Table::new();
        $this->assertInstanceOf(Table::class, $table);

        $this->assertIsInt($table->getWidth());
        $this->assertEquals(Table::DEFAULT_WIDTH, $table->getWidth());

        $this->assertIsInt($table->getHeight());
        $this->assertEquals(Table::DEFAULT_HEIGHT, $table->getHeight());
    }

    public function testNewWithValidParameters ()
    {
        $width = 9;
        $height = 66;

        $table = Table::new($width, $height);
        $this->assertInstanceOf(Table::class, $table);

        $this->assertIsInt($table->getWidth());
        $this->assertEquals($width, $table->getWidth());

        $this->assertIsInt($table->getHeight());
        $this->assertEquals($height, $table->getHeight());
    }

    public function testNewWithInvalidWidthThrowsException()
    {
        $width = -1;
        $height = 1;

        $this->expectException(\Exception::class);

        Table::new($width, $height);
    }

    public function testNewWithInvalidHeightThrowsException()
    {
        $width = 1;
        $height = -1;

        $this->expectException(\Exception::class);
        Table::new($width, $height);
    }
}
