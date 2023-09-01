<?php

namespace ToyRobot\Place;

final class Place
{
    const NORTH = 'NORTH';

    const SOUTH = 'SOUTH';

    const EAST = 'EAST';

    const WEST = 'WEST';


    /**
     * @var int
     */
    protected $x;

    /**
     * @var int
     */
    protected $y;

    /**
     * @var string
     */
    protected $facing;

    /**
     * @param $x
     * @param $y
     * @param $facing
     */
    private function __construct($x, $y, $facing)
    {
        $this->setX($x);
        $this->setY($y);
        $this->setFacing($facing);
    }

    /**
     * @throws \Exception
     */
    public static function new($x, $y, $facing): Place
    {
        $x = intval($x);

        if (! is_int($x) || $x < 0) {
            throw new \Exception('Invalid $x supplied.');
        }

        $y = intval($y);

        if (! is_int($y) || $y < 0) {
            throw new \Exception('Invalid $y supplied.');
        }

        $facing = trim($facing);

        if (! in_array($facing, [self::NORTH, self::SOUTH, self::EAST, self::WEST])) {
            throw new \Exception('Invalid $facing supplied.');
        }

        return new Place($x, $y, $facing);
    }

    public function __toString(): string
    {
        return sprintf(
            '%d,%d,%s',
            $this->getX(),
            $this->getY(),
            $this->getFacing()
        );
    }

    /**
     * @return int|null
     */
    public function getX(): ?int
    {
        return $this->x;
    }

    private function setX($x): void
    {
        $this->x = $x;
    }

    public final function getY() :?int
    {
        return $this->y;
    }

    private function setY($y): void
    {
        $this->y = $y;
    }

    public final function getFacing() :?string
    {
        return $this->facing;
    }

    private function setFacing($facing): void
    {
        $this->facing = $facing;
    }
}