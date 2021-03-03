<?php

use PHPUnit\Framework\TestCase;


class ReverseWordsInMbTextTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

     public function testPositive($input, $expected)
     {
        $this->assertEquals($expected ,ReverseWordsInMbText($input));
     }

    //  public function testNegative()
    //  {
    //      $this->expectException(InvalidArgumentException::class);
    //      snakeTextToCamelCaseTest(233);
    //  }
     
     public function positiveDataProvider()
     {
         return [
            ['привет свет', 'тевирп тевс'],
            ['АВЫФ ждло', 'ФЫВА олдж'],
            ['дивирп', 'привид'],
            ['джава скрипт', 'аважд тпиркс'],
            ['аліканте', 'етнакіла'],
        ];
     }
}
