<?php

use PHPUnit\Framework\TestCase;


class snakeTextToCamelCaseTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

     public function testPositive($input, $expected)
     {
         $this->assertEquals($expected ,snakeTextToCamelCase($input));
     }

    //  public function testNegative()
    //  {
    //      $this->expectException(InvalidArgumentException::class);
    //      snakeTextToCamelCaseTest(233);
    //  }
     
     public function positiveDataProvider()
     {
         return [
            ['hello_world', 'helloWorld'],
            ['Aloha_hello_', 'AlohaHello'],
            ['Lorem_Ipsum_Hello_world', 'LoremIpsumHelloWorld'],
            ['text_ghost_hunter', 'textGhostHunter'],
        ];
     }
}
