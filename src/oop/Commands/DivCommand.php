<?php

namespace src\oop\Commands;

class DivCommand implements CommandInterface
{
    /**
     * @inheritdoc
     */
    public function execute(...$args)
    {
        if (2 != sizeof($args)) {
            throw new \InvalidArgumentException('Not enough parameters');
        }

        if($args[1] == 0) {
            throw new \InvalidArgumentException('Error: Division By Zero');
        }

        return $args[0] / $args[1];
    }
}