<?php

use PHPUnit\Framework\TestCase;

class getUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */

    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected ,getUniqueFirstLetters($input));
    }

    public function positiveDataProvider()
    {
        return 
        [
            [ 
                [["name" => "Albuquerque Sunport International Airport"]  ], ['A'],
            ],
            [
                [["name" => "Boston Logan International Airport"]  ], ['B'],
            ],
            [
                [["name" => "Hollywood Burbank Airport"]  ], ['H'],
            ],
            [
                [["name" => "Charleston International Airport"]  ], ['C'],
            ],
            [
                [["name" => "Dallas Love Field"]  ], ['D'],
            ],
        ];
    }
}
