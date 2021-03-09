<?php
/**
 * Змінна $airports містить масив масивів аеропортів (див. Airports.php)
 * Створити функцію, яка повертає унікальну першу літеру кожного імені аеропорту
 * в алфавітному порядку
 *
 * Створіть тест PhpUnit (GetUniqueFirstLettersTest), який перевірить цю поведінку
 *
 * @param  array  $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports)
{
    // $result=[];
    // foreach($airports as $item){
    //     array_push($result,$item['name'][0]);
    // }

    // $result = array_unique($result);
    // sort($result, SORT_NATURAL | SORT_FLAG_CASE);

    $result = array_unique(array_map(function($airport){
        return $airport['name'][0];
    },$airports));
    sort($result, SORT_NATURAL | SORT_FLAG_CASE);

    return $result;
}