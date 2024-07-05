<?php
    
    require_once('./db_connect/index.php');

    $users=$pdo->prepare("select * from users");
    $users->execute();

    $res=$users->fetchAll();

    include "./layout.php";
?>