<?php
    require_once 'layots/header.php';
    require_once 'pdo_ini.php';
?>
<?php

    if(!isset($_SESSION['Auth'])) session_start();

    $stmt = $pdo->prepare('SELECT * FROM `lists` WHERE `user_id`=:user ORDER BY `name`');
    $stmt->execute(['user' => $_SESSION['Auth']]);
    $lists = $stmt->fetchAll();

    $i = 1;
?>

<div class="container">
    <h1 class="text-center">TODOLIST PAGE</h1>
    <a type="button" href="todo_list_create.php" class="btn btn-success m-1">Create TODO LIST</a>
    <table class="table table-striped table-dark">
        <thead class="thead-dark">
            <tr>
            <th scope="col" style="width:10%;">#</th>
            <th scope="col">Todo List</th>
            <th scope="col" class="w-25">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lists as $list) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><a href="todo_task_page.php?list_id=<?= $list['id']?>" class="text-decoration-none" style="color:cyan;"><?= $list['name']?></a></td>
                    <td>
                        <a type="button" href="todo_list_create.php?list_id=<?= $list['id']?>" class="btn btn-warning">UPDATE</a>
                        <a type="button" href="todo_list_delete.php?list_id=<?= $list['id']?>" class="btn btn-danger">DELETE</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php
    require_once 'layots/footer.php';
?>