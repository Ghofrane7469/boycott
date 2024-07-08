<?php
    
    require_once('./db_connect/index.php');

    $users=$pdo->prepare("select * from users");
    $users->execute();

    $res=$users->fetchAll();

<<<<<<< HEAD
    $page_titel="List Users";
    $template="index";

    include "./layout.phtml";
=======
    include "./layout.php";
>>>>>>> f6f39b1ad9da9dbafd474fa9f6872ef6e4b1037e
?>