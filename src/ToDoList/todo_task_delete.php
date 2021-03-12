<?php
    require_once 'pdo_ini.php';
  
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        
        $stmt = $pdo->prepare('DELETE FROM `tasks` WHERE `id`=:task_id');
        
        try{
            $stmt->execute(['task_id' => $_GET['task_id']]);
            $_SESSION['success'] = "TODO TASK DELETE IN DB";
        }catch(PDOExcepton $ex){
            $_SESSION['error'] = "ERROR DELETE TODO TASK IN DB";
        }

        Header('Location: todo_task_page.php?list_id=' . $_GET['list_id'] );
    }

    
