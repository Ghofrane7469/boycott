<?php

require_once('../db_connect/index.php');

$nom = "";
$prenom = "";
$email = "";
$password = "";

if (isset($_POST['submit'])) {

    $date = date('Y-m-d');
    $token = md5($email) . mt_rand(999, 999999);
    $verified=0;

}



$page_titel = "Create An Account";
$template = "signup";
$show = true;
include "../layout.phtml";