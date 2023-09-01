<?php

namespace ToyRobot\Robot;

use ToyRobot\Place\Place;
use ToyRobot\Table\Table;

final class Robot
{
    /**
     * @var Table
     */
    protected $table;

    /**
     * @var Place
     */
    protected $place;

    /**
     * @param Table $table
     */
    private function __construct(Table $table)
    {
        $this->setTable($table);
    }

    /**
     * @param Table $table
     *
     * @return Robot
     */
    public static function new (Table $table): Robot
    {
        return new Robot($table);
    }



    // `PLACE` will put the toy robot on the table in position X,Y
    //  and facing NORTH, SOUTH, EAST or WEST.
    //
    // The first valid command to the robot is a `PLACE` command, after that,
    // any sequence of commands may be issued, in any order,
    // including another `PLACE` command.
    // The application should discard all commands in the sequence until
    // a valid `PLACE` command has been executed

    public function place(Place $place): bool
    {
        $x = $place->getX();
        $y = $place->getY();

        if ($x > $this->getTable()->getWidth()) {
            return false;
        }

        if ($y > $this->getTable()->getWidth()) {
            return false;
        }

        $this->setPlace($place);
        return true;
    }

    // `REPORT` will announce the X,Y and F of the robot.
    // This can be in any form, but standard output is sufficient.

    public function report(): ?string
    {
        if (! $this->isPlaced()) {
            return null;
        }

        return $this->getPlace()->__toString();
    }


    // `LEFT` and `RIGHT` will rotate the robot 90
    // degrees in the specified direction without changing
    // the position of the robot.
    public function left(): bool
    {
        if (! $this->isPlaced()) {
            return false;
        }

        $facing = $this->getPlace()->getFacing();

        if ($facing === Place::NORTH) {
            $facing = Place::WEST;
        }

        elseif ($facing === Place::WEST) {
            $facing = Place::SOUTH;
        }

        elseif ($facing === Place::SOUTH) {
            $facing = Place::EAST;
        }

        else {
            $facing = Place::NORTH;
        }

        $this->setPlace(
            Place::new(
                $this->getPlace()->getX(),
                $this->getPlace()->getY(),
                $facing
            )
        );

        return true;
    }

    public function right(): bool
    {
        if (! $this->isPlaced()) {
            return false;
        }

        $facing = $this->getPlace()->getFacing();

        if ($facing === Place::NORTH) {
            $facing = Place::EAST;
        }

        elseif ($facing === Place::EAST) {
            $facing = Place::SOUTH;
        }

        elseif ($facing === Place::SOUTH) {
            $facing = Place::WEST;
        }

        else {
            $facing = Place::NORTH;
        }

        $this->setPlace(
            Place::new(
                $this->getPlace()->getX(),
                $this->getPlace()->getY(),
                $facing
            )
        );

        return true;
    }


    // `MOVE` will move the toy robot one unit
    // forward in the direction it is currently
    // facing.

    public function move(): bool
    {
        if (! $this->isPlaced()) {
            return false;
        }

        $facing = $this->getPlace()->getFacing();
        $x = $this->getPlace()->getX();
        $y = $this->getPlace()->getY();

        if ($facing === Place::NORTH) {
            if ($y < $this->getTable()->getHeight()) {
                $y++;
            }
        }

        if ($facing === Place::SOUTH) {
            if ($y > 0) {
                $y--;
            }
        }

        if ($facing === Place::EAST) {
            if ($x < $this->getTable()->getWidth()) {
                $x++;
            }
        }

        if ($facing === Place::WEST) {
            if ($x > 0) {
                $x--;
            }
        }

        $this->setPlace(Place::new($x, $y, $facing));

        return true;
    }

    private function isPlaced(): bool
    {
        return (bool) $this->getPlace();
    }

    private function setTable(Table $table): void
    {
        $this->table = $table;
    }

    private function getTable(): Table
    {
        return $this->table;
    }

    private function setPlace(Place $place): void
    {
        $this->place = $place;
    }

    private function getPlace(): ?Place
    {
        return $this->place;
    }
}
