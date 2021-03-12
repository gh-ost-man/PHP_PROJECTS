<?php
    require_once 'config.php';
    require_once 'pdo_ini.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // перевірка даних які прийшли

        if(!isset($_SESSION)) session_start();

        $email = htmlspecialchars(strtolower($_POST['email']));
        $password = sha1(SALT . $_POST['password'] . SALT);

        $stmt = $pdo->prepare('SELECT `id` FROM `users` WHERE `email` = :email AND `password` = :password');
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch();
    
        if($user){
            $_SESSION['Auth'] = $user['id'];
            Header("Location: todo_list_page.php");
        }else{
            $_SESSION['error'] = "Email or password incorrect";
            Header("Location: login_page.php");
        }
    }