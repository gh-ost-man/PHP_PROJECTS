<?php

use PHPUnit\Framework\TestCase;


class CheckNamesTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

     public function testPositive($input, $expected)
     {
        $this->assertEquals($expected ,CheckNames($input));
     }

    //  public function testNegative()
    //  {
    //      $this->expectException(InvalidArgumentException::class);
    //      CheckNames(233);
    //  }
     
     public function positiveDataProvider()
     {
         return [
            ['leith', 'The Leith'],
            ['london', 'The London'],
            ['hello', 'The Hello'],
            ['dolphin', 'The Dolphin'],
            ['alaska', 'Alaskalaska'],
            ['europe', 'Europeurope'],
        ];
     }
}
