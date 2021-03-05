<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
   /**
    *  @dataProvider positiveDataProvider
    */

   public function testPositive($input,$expected)
   {
      $this->assertEquals($expected,CountArguments(...$input));
   }

   public function positiveDataProvider()
   {
      return [
         [[], ['argument_count' => 0, 'argument_values' => []]],
         [['string'], ['argument_count' => 1,'argument_values' => ['string']]],
         [[1, 2, 3, 4, 5, 6], ['argument_count' => 6,'argument_values' => [1, 2, 3, 4, 5, 6]]],
         [[true, false], ['argument_count' => 2,'argument_values' => [true, false]]],
         [[1, 2, 3, 22.5, "HELLO"], ['argument_count' => 5,'argument_values' => [1, 2, 3, 22.5, "HELLO"]]],
      ];
   }
}
