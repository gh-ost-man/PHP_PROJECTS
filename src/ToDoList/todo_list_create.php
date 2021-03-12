<?php
    require_once 'layots/header.php';
    require_once 'pdo_ini.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['list_id'])){
        $stmt = $pdo->prepare('SELECT * FROM `lists` WHERE `id`=:id');
        $stmt->execute(['id' =>$_GET['list_id']]);
        
        $list = $stmt->fetch();
        $op = "UPDATE";
        var_dump($list['name']);
    }
    else $op = "CREATE";
?>

<h1 class="text-center"><?= $op?> TODO LIST</h1>

<div class="container" >
    <form method="POST">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php if(isset($list['id'])){ ?>
                    <input type="text" value="<?= $list['id']?>" name='id' hidden>
                <?php } ?>
                <div class="form-group">
                    <label for="exampleFormControlInput1">TODO LIST NAME</label>
                    <input type="text" class="form-control w-100" id="exampleFormControlInput1" required placeholder="TODO LIST NAME"  name="name" value= "<?= (isset($list['name'])) ? $list['name'] : ''?>">
                </div>
                <button type="submit" class="btn btn-success"><?= $op?></button>
                <a href="todo_list_page.php" type="button" class="btn btn-danger">CANCEL</a>
            </div>
            <div class="col-md-2"></div>
        </div>
    </form>
</div>

<?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(!isset($_SESSION['Auth'])) session_start();

        if(isset($_POST['id'])){
            $stmt = $pdo->prepare('UPDATE `lists` SET `name` = :name WHERE `id`= :id');
            $stmt->bindParam(':id',$_POST['id']);
        }
        else{
            $stmt = $pdo->prepare('INSERT INTO `lists` (`name`,`user_id`) VALUES (:name,:user)');

            $user_id = $_SESSION['Auth'];

            $stmt->bindParam(':user', $user_id);
        }

        $name = htmlspecialchars($_POST['name']);
        $stmt->bindParam(':name', $name);

        try{
            $stmt->execute();
            $_SESSION['success'] = "TODO LIST IS SAVED DB";
            
            Header('Location: todo_list_page.php');
        }catch (PDOException $ex){
            echo $ex->getMessage();
            $_SESSION['error'] = "ERROR SAVE TODO LIST IN DB";
            Header('Location: todo_list_page.php');
        }
    }   

    require_once 'layots/footer.php'; 
?>
   
