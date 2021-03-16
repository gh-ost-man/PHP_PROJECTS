<?php
    if(!isset($_SESSION)) session_start();

    if(isset($_SESSION['Auth'])){
        Header('Location: todo_list_page.php');
    }else{
        Header('Location: login_page.php');
    }