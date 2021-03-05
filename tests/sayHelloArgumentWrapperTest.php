<?php

use PHPUnit\Framework\TestCase;

class sayHelloArgumentWrapperTest extends TestCase
{
    /**
     * 
     */

   // @dataProvider positiveDataProvider
    //  public function testPositive($year, $expected)
    //  {
    //      $this->assertEquals($expected ,sayHelloArgumentWrapper($year));
    //  }

     public function testNegative()
     {
        $this->expectException(InvalidArgumentException::class);
        sayHelloArgumentWrapper([]);
     }
}
