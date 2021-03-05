<?php

use PHPUnit\Framework\TestCase;
class sayHelloArgumentTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected ,sayHelloArgument($input));
    }

    public function positiveDataProvider()
    {
        return [
           [123,"Hello 123"],
           [34534,"Hello 34534"],
           [12546543,"Hello 12546543"],
           [123.433,"Hello 123.433"],
           ["Aloha","Hello Aloha"],
           ["PHP","Hello PHP"],
           ["JS","Hello JS"],
           [true,"Hello 1"],
           [false,"Hello "],
        ];
    }
}
