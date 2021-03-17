<?php

namespace src\oop\Commands;

class PowCommand implements CommandInterface
{
    /**
     * @inheritdoc
     */
    public function execute(...$args)
    {
        if (2 != sizeof($args)) {
            throw new \InvalidArgumentException('Not enough parameters');
        }
        
        if($args[1] < 0 ){
            throw new \InvalidArgumentException('Not enough parameters');
        }

        if($args[0] < 0 && $args[1] > 0 && $args[1] < 1 && (1 / $args[1]) % 2 == 0){
            throw new \InvalidArgumentException('Not enough parameters');
        }

        $sign = 1;

        if($args[0] < 0 && $args[1] > 0 && $args[1] < 1 && (1 / $args[1]) % 2 != 0){
            $args[0] = abs($args[0]);
            $sign = -1;
        }

        return ($args[0] ** $args[1]) * $sign;
    }
}