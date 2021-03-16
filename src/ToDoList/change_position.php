<?php
    require_once 'pdo_ini.php';
    
    if($_SERVER['REQUEST_METHOD'] == "GET"){

        if(isset($_SESSION)) session_start();
        
        if(isset($_GET['id'])){
            $stmt = $pdo->prepare('UPDATE `tasks` SET `position`=:position WHERE `id`=:id');

            $position = $_GET['position'];

            if(isset($_GET['increase'])) {
                $position++;
            }
            if(isset($_GET['decrease'])) {
                $position--;

                if($position < 1) $position = 1;
            }
           
            $stmt->bindParam(':id',$_GET['id']);
            $stmt->bindParam(':position',$position);

            try {
                $stmt->execute(); 
            } catch(PDOException $ex){
                $_SESSION['error'] = "ERROR CHANGE POSITION";
            }

            Header('Location: todo_task_page.php?list_id='. $_GET['list_id']);
        }
    }