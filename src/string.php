<?php
    // Task 1
    // Змінна $input містить текст у випадку змії (тобто hello_world або this_is_home_task)
    // Перетворіть його в рядок у camel-cased і поверніть (тобто helloWorld або thisIsHomeTask)

    function snakeTextToCamelCase($input){
        
        // preg_replace_callback — Выполняет поиск по регулярному выражению и замену с использованием callback-функции
        // ucfirst — Преобразует первый символ строки в верхний регистр

        return preg_replace_callback('/_(.?)/' ,function($matches){
            //echo ucfirst($matches[1]) . '<br>';
            return ucfirst($matches[1]);
        }, $input);
    }

    // Task 2
    // Змінна $input містить багатобайтовий текст, такий як 'ФЫВА олдж'
    // Віддзеркаліть кожне слово окремо і поверніть перетворений текст (тобто "АВЫФ ждло")
    // !!! не змінювати порядок слів
    
    function ReverseWordsInMbText($input){
        // explode — Разбивает строку с помощью разделителя
        // implode — Объединяет элементы массива в строку
        // mb_str_split — Если задана многобайтовая строка возвращает массив символов
        $arr = explode(' ',$input);
        foreach($arr as $key => $val){
            $arr[$key] = implode('',array_reverse(mb_str_split($val,1)));
        }
        return implode(' ',$arr);
    }

    // Task 3 
    // Мені подобаються назви, які використовують формулу: 'The' + іменник з першою великою літерою.
    // Однак, коли іменник ПОЧИНАЄТЬСЯ І ЗАКІНЧУЄТЬСЯ з тією ж літери  мені подобається повторювати іменник двічі 
    // і з'єднувати їх разом з першою та останньою буквою,
    
    //  * dolphin -> The Dolphin
    //  * alaska -> Alaskalaska
    //  * europe -> Europeurope
    

    function CheckNames($name){

        // if($name[0] != $name[strlen($name)-1]){
        //     $name = 'The '.ucfirst($name); 
        // }
        // else {
        //     $name = ucfirst($name).substr($name,1);
        // }

        $name = ($name[0] != $name[strlen($name)-1])? 'The '.ucfirst($name) : ucfirst($name).substr($name,1);
        
        return  $name;
    } 
