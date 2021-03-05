<?php
///**************************************************************************************************************** */
// Завдання 1. - function repeatArrayValues(array $input)

// Змінна $input містить масив цифр
// Перетворити масив, який міститиме ті самі цифри, але повторюваний за його значенням без зміни порядку.
// Приклад: [1,3,2] => [1,3,3,3,2,2]

// $arr = [1,3,2];

function repeatArrayValues(array $input){

    $new_arr =[];

    foreach ($input as $value) {
        for ($i=0; $i < $value; $i++) { 
             array_push($new_arr, $value);
        }
    }

    return $new_arr;
}

// Завдання 2. - getUniqueValue(array $input)
// Змінна $input містить масив цифр
// Поверніть найменше унікальне значення або 0, якщо немає унікальних значень або масив порожній.
// Приклад: [1, 2, 3, 2, 1, 5, 6] => 3

function getUniqueValue(array $input){
   
    if(count($input) == 0) return 0;

    $new_arr = array_filter(array_count_values($input),function($item){
        return $item == 1;
    });

    if(count($new_arr) == 0) return 0;
    
    return min(array_keys($new_arr));
}

// Завдання 3. - groupByTag(array $input)
// Змінна $ input містить масив масивів
// Кожен підмасив має ключі: ім'я (містить рядки), теги (містить масив рядків)
// Повернути список імен, згрупованих за тегами
// !!! "Імена" у поверненому масиві повинні бути відсортовані за зростанням.


function groupByTag(array $input){
      $result=[];
 
     foreach ($input as $value) {
        foreach ($value['tags'] as $item) {
            if(array_key_exists($item,$result)){
                $result[$item][] = $value['name'];
                sort($result[$item],SORT_NATURAL | SORT_FLAG_CASE);
            }else{
                $result[$item] = [$value['name']];
            }
        }
    }
    
    ksort($result, SORT_NATURAL | SORT_FLAG_CASE);

    return $result;
}