<?php
require_once './functions.php';

$airports = require './airports.php';
$url = '';

// Filtering
/**
 * Тут вам потрібно перевірити $ _GET запит, якщо він має якусь фільтрацію
 * застосовуйте фільтрацію за першою літереєю за назвою аеропорту та / або штатом аеропорту
 * (див. завдання фільтрації 1 і 2 нижче)
 */

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['filter_by_first_letter'])){
            $url .= 'filter_by_first_letter=' . $_GET['filter_by_first_letter'];; 
            $filter = $_GET['filter_by_first_letter'];
            $airports = array_filter($airports, function($item) use ($filter){
                return $item['name'][0] == $filter;
            });
        }

        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
            usort($airports, function($a,$b) use ($sort){
                return strnatcmp($a[$sort],$b[$sort]);
            });
        }


    }

// Sorting
/**
 * Тут вам потрібно перевірити $ _GET запит, якщо він має ключ сортування 
 * та застосувати сортування
 * (див. завдання сортування нижче)
 */

   

// Pagination
/**
 * Тут вам потрібно перевірити $ _GET запит, якщо він має ключ пагінації
 * та застосувати логіку пагінації
 * (див. завдання з нумерації сторінок нижче)
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Airports</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">

    <h1 class="mt-5">US Airports</h1>

    <!--
        Завдання фільтрації No1
         Замініть # в атрибуті HREF так, щоб посилання йшло на ту саму сторінку клавішею filter_by_first_letter
         тобто /?filter_by_first_letter=A або /?filter_by_first_letter=B
         Переконайтеся, що логіка нижче також працює:
          - коли ви застосовуєте filter_by_first_letter, сторінка повинна дорівнювати 1
          - коли ви застосовуєте filter_by_first_letter, тоді filter_by_state (див. Завдання фільтрації №2) не скидається
            тобто якщо ви встановили filter_by_state, ви можете додатково використовувати filter_by_first_letter
    -->
    <div class="alert alert-dark">
        Filter by first letter:

        <?php foreach (getUniqueFirstLetters(require './airports.php') as $letter): ?>
            <a href="index.php?filter_by_first_letter=<?= $letter ?>"><?= $letter ?></a>
        <?php endforeach; ?>

        <a href="/" class="float-right">Reset all filters</a>
    </div>

    <!--
    Завдання сортування
         Замініть # у HREF, щоб посилання переходило на ту саму сторінку клавішею сортування з належним значенням сортування
         тобто /?sort=name або /?sort=code тощо
         Переконайтеся, що логіка нижче також працює:
          - при застосуванні сортування пагінація та фільтрація не скидаються
            тобто якщо у вас вже є /?page=2&filter_by_first_letter=A після застосування сортування URL-адреса повинна виглядати так
            /?page=2&filter_by_first_letter=A&sort=name
    -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><a href="index.php/sort=name">Name</a></th>
                <th scope="col"><a href="index.php/sort=code">Code</a></th>
                <th scope="col"><a href="index.php/sort=state">State</a></th>
                <th scope="col"><a href="index.php/sort=city">City</a></th>
                <th scope="col">Address</th>
                <th scope="col">Timezone</th>
            </tr>
        </thead>
        <tbody>
        <!--
            Завдання фільтрації No2
             Замініть # у HREF, щоб посилання йшло на ту саму сторінку за допомогою ключа filter_by_state
             тобто /?filter_by_state=A або /?filter_by_state=B
             Переконайтеся, що логіка нижче також працює:
              - коли ви застосовуєте filter_by_state, сторінка повинна дорівнювати 1
              - коли ви застосовуєте filter_by_state, тоді filter_by_first_letter (див. завдання фільтрації №1) не скидається
                тобто, якщо ви встановили filter_by_first_letter, ви можете додатково використовувати filter_by_state
        -->
        <?php foreach ($airports as $airport): ?>
        <tr>
            <td><?= $airport['name'] ?></td>
            <td><?= $airport['code'] ?></td>
            <td><a href="index.php?filter_by_state=qwerty&<? $url?>"><?= $airport['state'] ?></a></td>
            <td><?= $airport['city'] ?></td>
            <td><?= $airport['address'] ?></td>
            <td><?= $airport['timezone'] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!--
        Завдання пагінації
        Замініть HTML нижче, щоб він відображав реальні сторінки залежно від кількості аеропортів після всіх застосованих фільтрів
        Переконайтеся, що логіка нижче також працює:
          - показати 5 аеропортів на сторінці
          - використовувати ключ сторінки (тобто /? page = 1)
          - при застосуванні пагінації - усі фільтри та сортування не скидаються
    -->
    <nav aria-label="Navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>

</main>
</html>