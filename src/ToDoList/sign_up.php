<?php
    require_once 'config.php';
    require_once 'pdo_ini.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // перевірка даних які прийшли

        if(!isset($_SESSION)) session_start();

        $email = htmlspecialchars(strtolower($_POST['email']));
        $password = sha1(SALT . $_POST['password'] . SALT);

        $stmt = $pdo->prepare('SELECT `id` FROM `users` WHERE `email` = :email');
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();

        if($user){
            $_SESSION['error'] = "User is exists";
            Header("Location: login_page.php");
        }else {
            $stmt = $pdo->prepare('INSERT INTO `users` (`email`,`password`) VALUES (:email, :password)');
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $user_id = $pdo->lastInsertId();
            
            $_SESSION['Auth'] = $user_id;
            Header('Location: todo_list_page.php');
        }
    }