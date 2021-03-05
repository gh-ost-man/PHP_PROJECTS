<?php
/**
 * Create a PhpUnit test (SayHelloTest) which will check that function below returns a correct result
 * i.e. returns 'Hello'
 *
 * @return string
 */
function sayHello()
{
    return 'Hello';
}

/**
 * Створіть тест PhpUnit (SayHelloArgumentTest), який перевірить, чи функція нижче повертає правильний результат
 * Перевірте, як це працює: число, рядок, значення bool
 *
 * @param $arg
 * @return string
 */
function sayHelloArgument($arg)
{
    return "Hello $arg";
}


/**
 * Що можна поставити замість $arg
 * так що функція викидає InvalidArgumentException, якщо $arg не є: число, рядок або bool
 *
 * !Створіть тест PhpUnit (SayHelloArgumentWrapperTest), який перевірить цю поведінку
 * !!! вам потрібно протестувати лише винятковий випадок, оскільки поведінка sayHelloArgument вже була перевірена у вищезазначеному завданні
 *
 * @param $arg
 * @return string
 * @throws InvalidArgumentException
 */
function sayHelloArgumentWrapper($arg)
{
    if(!is_scalar($arg))
        throw new InvalidArgumentException('InvalidArgumentException');

    return sayHelloArgument($arg);
}

/**
 * Створіть тест PhpUnit (CountArgumentsTest), який перевірить, чи функція нижче повертає правильний результат
* Перевірте, як це працює: немає аргументів, один аргумент рядка, пара аргументів рядка
 *
 * @return array
 */
function countArguments()
{
    return [
        'argument_count'  => func_num_args(),
        'argument_values' => func_get_args(),
    ];
}

/**
 * Виконайте функцію countArgumentsWrapper, щоб вона викликала вихідну функцію (countArguments)
 * але перевірте, чи всі аргументи є рядками, і в іншому випадку викидає InvalidArgumentException
 *
 * Створіть тест PhpUnit (CountArgumentsWrapperTest), який перевірить цю поведінку
 * !!! вам потрібно протестувати лише винятковий випадок, оскільки поведінка countArguments вже була перевірена у вищезазначеному завданні
 *
 * Вам потрібно буде скористатися функцією "Argument unpacking via ...", щоб передати параметри в функцію wrapped
 * 
 *  * @see https://www.php.net/manual/en/migration56.new-features.php#migration56.new-features.splat
 *
 * @return array
 * @throws InvalidArgumentException
 */
function countArgumentsWrapper()
{
    foreach(func_get_args() as $item){
        if(!is_string($item)) {
            throw new InvalidArgumentException('InvalidArgumentException');
        }
    }

    countArguments();
}