<?php
if(!isset($_SESSION)) session_start();
//$_SESSION['Auth'] = 1;
// session_unset();
// session_destroy();

if(isset($_SESSION['Auth'])){
    Header('Location: todo_list_page.php');
}else{
    Header('Location: login_page.php');
}
?>

<h1>HELLO ALOHA</h1>

