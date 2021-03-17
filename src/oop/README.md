# Simple programmable calculator

Він має початкове значення 0 (за замовчуванням ви можете використовувати метод "init", щоб вказати початкове значення), і метод "getResult" для отримання результатів розрахунку.

Сам клас "Калькулятор" не може робити жодних обчислень. Для цього потрібні додаткові команди, які можна прикріпити на льоту і виконуватимуть обчислення.

Наприклад, SubCommand - знає, як робити віднімання, SumCommand - як робити додавання тощо.

### How to use Calculator

```php
<?php

use src\oop\Calculator;
use src\oop\Commands\SubCommand;
use src\oop\Commands\SumCommand;

$calc = new Calculator(); // the calculator itself
$calc->addCommand('+', new SumCommand()); // here we teach calculator how to do Addition
$calc->addCommand('-', new SubCommand()); // here we teach calculator how to do Subtraction

echo $calc->init(1) // set initial value = 1
    ->compute('+', 5)
    ->compute('-', 3)
    ->getResult(); 
```

Більше прикладів можна знайти в `. / Example.php`

## !!!
!!! Цей калькулятор простий і не повинен охоплювати пріоритети операцій. Тобто 2 + 3 * 5 має повернути 25

## Тестування завдань

* Створіть модульні тести для `src\oop\Commands\SubCommand`
* Створіть 3 нові команди (множення, ділення, піднесення до степеня (n > 0; 0 < n < 1; n => 1)) та охопіть їх модульними тестами
* Дізнайтеся більше про модульне тестування (наприклад, https://www.youtube.com/watch?v=k9ak_rv9X0Y&list=PLfdtiltiRHWGXSggf05W-pJbD47-_d8bJ&index=1)

## Програмування завдань

* Впровадити метод UNDO в калькуляторі (див. Example.php)
* Впровадити метод REPLAY у калькуляторі (див. Example.php)
