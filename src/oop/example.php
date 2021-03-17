<?php
include_once '../../vendor/autoload.php';

use src\oop\Calculator;
use src\oop\Commands\SubCommand;
use src\oop\Commands\SumCommand;
use src\oop\Commands\MultCommand;
use src\oop\Commands\DivCommand;
use src\oop\Commands\PowCommand;

$calc = new Calculator();
$calc->addCommand('+', new SumCommand());
$calc->addCommand('-', new SubCommand());
$calc->addCommand('*', new MultCommand());
$calc->addCommand('/', new DivCommand());
$calc->addCommand('^', new PowCommand());

// Ви можете використовувати будь-яку операцію для обчислень
// виведе 2

echo $calc->init(1)
    ->compute('+', 1)
    ->getResult();

echo PHP_EOL;

// виведе 10

echo $calc->init(15)
    ->compute('+', 5)
    ->compute('-', 10)
    ->getResult();

echo PHP_EOL;

// TODO реалізує метод повтору
// повинен вивести 4

echo $calc->init(1)
    ->compute('+', 1)
    ->replay()
    ->replay()
    ->getResult();

echo PHP_EOL;

// TODO реалізує метод скасування
// повинен вивести 1

echo $calc->init(1)
    ->compute('+', 5)
    ->compute('+', 5)
    ->undo()
    ->undo()
    ->getResult();

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

echo $calc->init(10)
    ->compute('/', 2)
    ->getResult();

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
 
echo $calc->init(5)
    ->compute('*',5)
    ->getResult();

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

echo $calc->init(5)
    ->compute('^', 5)
    ->getResult();

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

echo $calc->init(5)
    ->compute('+', 5)
    ->compute('+', 5)
    ->undo()
    ->getResult();

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

echo $calc->init(5)
    ->compute('*', 3)
    ->replay()
    ->replay()
    ->undo()
    ->getResult();

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

echo $calc->init(3)
    ->compute('^',-3)
    ->getResult();
