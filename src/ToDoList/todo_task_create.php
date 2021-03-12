<?php
    require_once 'layots/header.php';
    require_once 'pdo_ini.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['task_id'])){
        $stmt = $pdo->prepare('SELECT * FROM `tasks` WHERE `id`=:id' );
        $stmt->execute(['id' =>$_GET['task_id']]);
        
        $task = $stmt->fetch();
        $op = "UPDATE";
    }
    else $op = "CREATE";
   
?>

<h1  class="text-center"><?= $op?> NEW TASK</h1>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="POST">
                <input type="text" class="form-control" value="<?= (isset($_GET['list_id']))? $_GET['list_id']:'' ?>" id="exampleFormControlInput1" hidden name="list_id">
               
                <?php if (isset($_GET['task_id'])) { ?>
                    <input type="text" class="form-control" value="<?= (isset($_GET['task_id']))? $_GET['task_id']:'' ?>" id="exampleFormControlInput1" hidden name="task_id">
                <?php } ?>
               
                <div class="form-group">
                    <label for="exampleFormControlInput1">CREATE NEW TASK</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required placeholder="NEW TASK"  value="<?= (isset($task['name']))? $task['name']:'' ?>" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">POSITION</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" value="<?= (isset($task['position'])) ? $task['position'] : ''?>"  name="position">
                </div>
                <?php if(isset($_GET['task_id'])) { ?>
                    <div class="form-group">
                        <input type="checkbox" name='completed'>
                        <label for="completed">COMPLETED</label>
                    </div>
                <?php } ?>
                <button type="submit" class="btn btn-success"><?= $op ?></button>
                <a href ="todo_task_page.php?list_id=<?= $_GET['list_id'] ?>"  class="btn btn-danger">CANCEL</a>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php 
    require_once 'layots/footer.php';
    
    if($_SERVER['REQUEST_METHOD']=="POST"){

        if(!isset($_SESSION)) session_start();

        if(isset($_POST['task_id'])){
            $stmt = $pdo->prepare('UPDATE `tasks` SET `name` =:name, `position` = :position WHERE `id`=:task_id');
            $stmt->bindParam(':task_id', $_POST['task_id']);
        }
        else{
            $stmt = $pdo->prepare('INSERT INTO `tasks` (`name`,`user_id`,`list_id`,`position`) VALUES (:name,:user_id, :list_id, :position)');
            $stmt->bindParam(':user_id', $_SESSION['Auth']);
            $stmt->bindParam(':list_id',  $_POST['list_id']);
        }

        $name = htmlspecialchars($_POST['name']);
        $position = (!empty($_POST['position']))? $_POST['position'] : 1;

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':position', $position);

        try{
            $stmt->execute();
            $_SESSION['success'] = "Task IS SAVED DB";
        }catch(PDOException $ex){
            echo $ex->getMessage();
            die();
            $_SESSION['error'] = "ERROR SAVE Task IN DB";
        }
       
        Header('Location: todo_task_page.php?list_id=' . $_POST['list_id']);
    }
    
?>