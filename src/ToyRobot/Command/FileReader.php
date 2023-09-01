<?php

namespace ToyRobot\Command;

use ToyRobot\Place\Place;
use ToyRobot\Robot\Robot;

final class FileReader
{
    public static function new(Robot $robot, $filename)
    {
        $generator = function () use ($robot, $filename) {

            if (! $fileHandle = fopen($filename, 'r')) {
                return;
            }

            while (false !== $line = fgets($fileHandle)) {
                if (! $line) {
                    return;
                }

                $line = trim($line);

                $parts = explode(' ', $line, 2);

                if (count($parts) === 2) {
                    if ($parts[0] === 'PLACE') {

                        $params = explode(',', $parts[1]);
                        yield PlaceCommand::new(
                            $robot,
                            Place::new(...$params)
                        );
                    }
                }

                if ($parts[0] === 'MOVE') {
                    yield MoveCommand::new($robot);
                }

                if ($parts[0] === 'LEFT') {
                    yield LeftCommand::new($robot);
                }

                if ($parts[0] === 'RIGHT') {
                    yield RightCommand::new($robot);
                }

                if ($parts[0] === 'REPORT') {
                    yield ReportCommand::new($robot);
                }
            }

            fclose($fileHandle);
        };

        return $generator();
    }
}