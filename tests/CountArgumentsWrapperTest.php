<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
   // public function testPositive($expected)
   // {
   //    $this->assertEquals($expected ,CountArgumentsWrapper());
   // }
   public function testNegative()
   {
      $this->expectException(InvalidArgumentException::class);
      CountArgumentsWrapper(1);
   }
}
