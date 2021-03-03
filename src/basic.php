<?php

 // Task 1
    // Змінна $minute містить число від 0 до 59 (тобто 10 або 25 або 60 тощо).
    // Визначте, яка четверть години.
    // Поверніть одне зі значень: "перший", "другий", "третій" і "четвертий".
    // Викиньте InvalidArgumentException, якщо $ хвилина від’ємна більше 60. 
    //(throw new InvalidArgumentException('InvalidArgumentException');)


    //ceil() Возвращает ближайшее большее целое от value.
    function getMinuteQuarter(int $minute){
        if($minute == 0)$minute = 60;
        switch(ceil($minute / 15)){
            case 1:
                return 'first';
            break;
            case 2:
                return 'second';
            break;
            case 3:
                return 'third';
            break;
            case 4:
                return 'fourth';
            break;
            default:
            throw new InvalidArgumentException('InvalidArgumentException');
        }
    }

    // Task 2
    // Змінна $year містить рік (тобто 1995 або 2020 тощо).
    // Повернути true, якщо рік є високосним або помилковим інакше.
    // Викиньте InvalidArgumentException, якщо $year менше 1900 або не число.


    function checkLeapYear($year){
        if($year < 1900 || !is_numeric($year)){
            throw new InvalidArgumentException('InvalidArgumentException');
        }
        if($year % 4 == 0 || $year % 100 != 0 && $year % 400 == 0) return true;
        else return false;
    }

    // Task 3
    // Змінна $input містить рядок із шести цифр (наприклад, "123456" або "385934").
    // Повернути true, якщо сума перших трьох цифр дорівнює сумі останніх трьох цифр
    // (тобто в першому випадку 1 + 2 + 3 не дорівнює 4 + 5 + 6 - потрібно повернути false).
    // Викиньте InvalidArgumentException, якщо введення $input більше або менше 6 цифр.

    function checkNumber($input){
        if(strlen($input)!=6) {
            throw new InvalidArgumentException("InvalidArgumentException");
        }

       $arr = str_split($input);

       if($arr[0] + $arr[1] + $arr[2] == $arr[3] + $arr[4] + $arr[5]){
            return true;
       }else return false;
    }
