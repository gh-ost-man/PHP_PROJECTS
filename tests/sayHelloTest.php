<?php

use PHPUnit\Framework\TestCase;

class sayHelloTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected ,sayHello(...$input));
    }

    public function positiveDataProvider()
    {
        return [
            [[1],'Hello'],
            [["Aloha"],'Hello'],
            [[1,3,4,5],'Hello'],
            [[1,4,5,6],'Hello'],
        ];
          
    }
}
