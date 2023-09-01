<?php

namespace ToyRobot\Command;

use ToyRobot\Robot\RobotAwareTrait;

class Commander implements CommandInterface
{
    use RobotAwareTrait;

    private $commands = [];

    private function __construct($commands)
    {
        $this->setCommands($commands);
    }

    public static function new ($commands): Commander
    {
        return new Commander($commands);
    }

    public function execute()
    {
        $result = null;

        foreach ($this->getCommands() as $command) {
            $result = $command->execute();
        }

        return $result;
    }

    /**
     * @return array
     */
    private function getCommands()
    {
        return $this->commands;
    }

    private function setCommands($commands): void
    {
        $this->commands = $commands;
    }
}