<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/85e3aaf13e.js" crossorigin="anonymous"></script>
  </head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?php
            if (!isset($_SESSION))session_start();
            if (isset($_SESSION['Auth'])){
        ?>
        
        <a class="nav-link" href="todo_list_page.php">TODO_List<span class="sr-only">(current)</span></a>
        <?php 
            } else { 
        ?>
        
        <a class="nav-link" href="#">TODO_List<span class="sr-only">(current)</span></a>
        <?php 
            }
        ?>
      
      </li>
    </ul>
    <?php
        if (!isset($_SESSION))session_start();
        if (isset($_SESSION['Auth'])){
    ?>
    <a href="log_out.php" class="btn btn-outline-info ">Log out</a>
    <?php 
    }
    ?>
  </div>
</nav>

<?php
    if (isset($_SESSION['error'])){
?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> <?= $_SESSION['error'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
  unset($_SESSION['error']);
}
?>

<?php
    if (isset($_SESSION['success'])){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>INFO!</strong> <?= $_SESSION['success'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
  unset($_SESSION['success']);
}
?>