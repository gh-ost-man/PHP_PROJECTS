<?php
    require_once 'pdo_ini.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        if(isset($_SESSION)) session_start();
        if(isset($_POST['id'])){
            $stmt= $pdo->prepare('UPDATE `tasks` SET `completed`=:completed,`completed_at`=:completed_at WHERE `id`=:id');
           
            $date = null;

            if($_POST['completed']) {
               $date = date('Y-m-d H:i:s');
            }

            $stmt->bindParam(':id',$_POST['id']);
            $stmt->bindParam(':completed',$_POST['completed']);
            $stmt->bindParam(':completed_at', $date);
            $stmt->execute();            

            echo json_encode(['status'=> 'success', 'completed' => !$_POST['completed'],'date' => $date, 'id' => $_POST['id']]);
        }
    }else{
        // json_encode - перетворює масив в стрічку  json
        echo json_encode(['status'=> 'error']);
    } 