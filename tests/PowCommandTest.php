<?php

use PHPUnit\Framework\TestCase;
use src\oop\Commands\PowCommand;

class PowCommandTest extends TestCase
{
    /**
     * @var PowCommand
     */
    private $command;

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function setUp(): void
    {
        $this->command = new PowCommand();
    }

    /**
     * @return array
     */
    public function commandPositiveDataProvider()
    {
        return [
            [2, 2, 4],
            [-10, 2, 100],
            [5, 2, 25],
            [-8, 1/3, -2],
        ];
    }

    /**
     * @dataProvider commandPositiveDataProvider
     */
    public function testCommandPositive($a, $b, $expected)
    {
        $result = $this->command->execute($a, $b);

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array
     */
    public function commandNegativeDataProvider()
    {
        return [
            [-5, 0.5],
            [-8, 0.25],
            [0, -2],
        ];
    }

    /**
     * @dataProvider commandNegativeDataProvider
     */
    public function testCommandNegative($a, $b)
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->command->execute($a,$b);
    }

    /**
     * @see https://phpunit.readthedocs.io/en/9.3/fixtures.html#more-setup-than-teardown
     *
     * @inheritdoc
     */
    public function tearDown(): void
    {
        unset($this->command);
    }
}