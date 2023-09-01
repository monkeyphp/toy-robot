<?php

namespace ToyRobot\Command;

interface CommandInterface
{
    /**
     * @return mixed
     */
    public function execute();
}