<?php
    require_once 'pdo_ini.php';
  
    if($_SERVER['REQUEST_METHOD'] == "GET") {
        
        $stmt = $pdo->prepare('DELETE FROM `lists` WHERE `id`=:id');
        
        try{
            $stmt->execute(['id' => $_GET['list_id']]);
            $_SESSION['success'] = "TODO LIST DELETE IN DB";
        }catch(PDOExcepton $ex){
            $_SESSION['error'] = "ERROR DELETE TODO LIST IN DB";
        }

        Header('Location: todo_list_page.php');
    }