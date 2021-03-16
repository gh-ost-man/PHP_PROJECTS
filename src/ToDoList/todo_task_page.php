<?php
    require_once 'layots/header.php';
    require_once 'pdo_ini.php';

    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $stmt = $pdo->prepare('SELECT * FROM `tasks` WHERE `list_id` =:list_id ORDER BY `position`,`name`');
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->bindParam(':list_id', $_GET['list_id']);
        $stmt->execute();

        $tasks = $stmt->fetchAll();
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
                    <a href="change_position.php?id=<?= $task['id']?>&list_id=<?= $_GET['list_id']?>&position=<?= $task['position']?>&increase=true" class="border-0 bg-transparent num_up" value="<?= $task['id']?>"><i class="far fa-arrow-alt-circle-up" style="color:cyan;"></i></a>
                    <a href="change_position.php?id=<?= $task['id']?>&list_id=<?= $_GET['list_id']?>&position=<?= $task['position']?>&decrease=true" class="border-0 bg-transparent num_down" value="<?= $task['id']?>"><i class="far fa-arrow-alt-circle-down" style="color:cyan;"></i></a>
                </td>
                <td class="text-center"><a href="#" class="text-decoration-none" style="color:cyan;"><?= $task['created_at'] ?></a></td>
                <td class="text-center">
                    <input type="checkbox" <?= ($task['completed'])? 'checked': ''?> class="completed" value="<?= $task['id']?>">
                </td>
                <td class="text-center">
                    <p class="text-info p-0 m-0" id="completed_text<?= $task['id']?>"><?= ($task['completed_at'])? $task['completed_at'] : '' ?></p>
                </td>
                <td class="text-center">
                    <a type="button" href="todo_task_delete.php?task_id=<?= $task['id'] ?>&list_id=<?= $_GET['list_id'] ?>" class="btn btn-danger">DELETE</a>
                    <a type="button" href="todo_task_create.php?task_id=<?= $task['id'] ?>&list_id=<?= $_GET['list_id'] ?>" class="btn btn-warning">UPDATE</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script>
    $('.completed').change(function(){
        var completed;
        var attr = $(this).attr('checked');

        if(typeof attr != typeof undefined && attr !== false){
            $(this).removeAttr('checked');
            completed = 0;
        } else {
            $(this).attr('checked','checked');
            completed = 1;
        }

        $.post('completed_task.php',{
            id: $(this).val(),
            completed: completed
        }, 
        function (data){
            response = JSON.parse(data);

            if(response.status == 'success'){
                $('#completed_text' + response.id).html(response.date)
                document.location.reload();
            } else {
                alert('error');
            }
        });
    })
</script>

<?php require_once 'layots/footer.php'; ?>