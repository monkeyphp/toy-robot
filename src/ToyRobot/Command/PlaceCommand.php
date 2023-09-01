<?php

namespace ToyRobot\Command;

use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;

class PlaceCommand extends RobotCommand
{
    private $place;

    private function __construct(Robot $robot, Place $place)
    {
        $this->setRobot($robot);
        $this->setPlace($place);
    }

    public static function new(Robot $robot, Place $place): PlaceCommand
    {
        return new static($robot, $place);
    }

    /**
     * @inheritDoc
     */
    public function execute(): bool
    {
        return $this->getRobot()->place(
            $this->getPlace()
        );
    }

    /**
     * @return mixed
     */
    private function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    private function setPlace($place): void
    {
        $this->place = $place;
    }
}