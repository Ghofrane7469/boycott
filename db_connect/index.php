<?php 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_Pass','');
define('DB_name','boycott_bd');
$pdo=new PDO('mysql:host='.DB_HOST.';dbname='.DB_name,DB_USER,DB_Pass);
?>