<?php

namespace ToyRobot\Table;

class Table
{

    public const DEFAULT_WIDTH = 5;

    public const DEFAULT_HEIGHT = 5;

    private $width = self::DEFAULT_WIDTH;

    private $height = self::DEFAULT_HEIGHT;


    /**
     * @throws \Exception
     */
    public static function new($width = self::DEFAULT_WIDTH, $height = self::DEFAULT_HEIGHT): Table
    {
        if (! is_int($width) || $width < 1) {
            throw new \Exception('Supplied width is invalid');
        }

        if (! is_int($height) || $height < 1) {
            throw new \Exception('Supplied height is invalid');
        }

        return new static($width, $height);
    }

    final public function getWidth(): int
    {
        return $this->width;
    }

    final public function getHeight (): int
    {
        return $this->height;
    }

    private function __construct($width, $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    private function setWidth($width): void
    {
        $this->width = $width;
    }

    private function setHeight($height): void
    {
        $this->height = $height;
    }

}
