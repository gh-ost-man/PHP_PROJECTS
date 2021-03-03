<?php

use PHPUnit\Framework\TestCase;

class checkLeapYearTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

     public function testPositive($year, $expected)
     {
         $this->assertEquals($expected ,checkLeapYear($year));
     }

     public function testNegative()
     {
         $this->expectException(InvalidArgumentException::class);
         checkLeapYear(23);
     }
     
     public function positiveDataProvider()
     {
         return [
            [2019, false],
            [2020, true],
            [2021, false],
            [2022, false],
            [2023, false],
            [2024, true],
            [2025, false],
            [2026, false],
            [2027, false],
            [2028, true],
            [2200, true]
        ];
     }

     
}
