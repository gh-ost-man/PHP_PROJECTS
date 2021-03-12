<?php
    require_once 'layots/header.php';
    require_once 'pdo_ini.php';

    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $stmt = $pdo->prepare('SELECT * FROM `tasks` WHERE `list_id` =:list_id ORDER BY `position`,`name`');
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->bindParam(':list_id', $_GET['list_id']);
        $stmt->execute();

        $tasks = $stmt->fetchAll();

        //var_dump($tasks);
    }

    $i = 1;
?>

<div class="container">
    <h1 class="text-center">TASKS PAGE</h1>
    <a type="button" href="todo_task_create.php?list_id=<?= $_GET['list_id'] ?>" class="btn btn-success m-1">Create TASK</a>
    <table class="table table-striped table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="max-width: 40%;">TASK</th>
                <th scope="col" class="text-center">POSITION</th>
                <th scope="col" class="text-center">DATE STARTED</th>
                <th scope="col" class="text-center">COMPLETED</th>
                <th scope="col" class="text-center">DATE COMPLETED</th>
                <th scope="col" class="text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $task) :?>
            <tr>
                <th scope="row" class="text-center"><?= $i++ ?></th>
                <td ><a href="#" class="text-decoration-none" style="color:cyan;"><?= $task['name'] ?></a></td>
                <td class="text-center">
                    <a href="#" class="text-decoration-none" style="color:cyan;"><?= $task['position'] ?></a>
                    <button class="border-0 bg-transparent"><i class="far fa-arrow-alt-circle-up" style="color:cyan;"></i></button>
                    <button class="border-0 bg-transparent"><i class="far fa-arrow-alt-circle-down" style="color:cyan;"></i></button>
                </td>
                <td class="text-center"><a href="#" class="text-decoration-none" style="color:cyan;"><?= $task['created_at'] ?></a></td>
                <!-- <td class="text-center"><input type="checkbox" name="" id=""></td> -->
                <td class="text-center text-warning">
                    <?php if($task['completed'] == 0) {?>
                        <p href="#" class="text-warning p-0 m-0">not completed</p>
                    <?php } else {?>
                        <p href="#" class="text-info  p-0 m-0">completed</p>
                    <?php } ?>
                </td>
               
                <td class="text-center"><a href="#" class="text-decoration-none" style="color:cyan;"><?= $task['completed_at'] ?></a></td>
                <td class="text-center">
                    <a type="button" href="todo_task_delete.php?task_id=<?= $task['id'] ?>&list_id=<?= $_GET['list_id'] ?>" class="btn btn-danger">DELETE</a>
                    <a type="button" href="todo_task_create.php?task_id=<?= $task['id'] ?>&list_id=<?= $_GET['list_id'] ?>" class="btn btn-warning">UPDATE</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php require_once 'layots/footer.php'; ?>