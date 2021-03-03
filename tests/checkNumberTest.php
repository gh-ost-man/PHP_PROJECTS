<?php

use PHPUnit\Framework\TestCase;

class checkNumberTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

     public function testPositive($input, $expected)
     {
         $this->assertEquals($expected ,checkNumber($input));
     }

     public function testNegative()
     {
         $this->expectException(InvalidArgumentException::class);
         checkNumber(233);
     }
     
     public function positiveDataProvider()
     {
         return [
            [123456, false],
            [233212, false],
            [123455, false],
            [546654, true],
            [235546, false],
            [987843, false],
            [971197, true],
            [892292, false],
        ];
     }

     
}
