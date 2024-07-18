<?php

require_once('../db_connect/index.php');
//ctype_digit : Id Numerique
if(!(array_key_exists('id',$_GET) or array_key_exists('id',$_POST)) and !(ctype_digit($_GET['id']) or ctype_digit($_POST['id']))){
    header("location:../index.php");
}

$id = array_key_exists('id',$_GET) ? $_GET['id'] : $_POST['id'];

$errors = [];
if (array_key_exists('submit', $_POST)) {
    extract($_POST);
    if (empty($nom)) {
        $errors['nom'] = "Nom Required";
        //goto show;
     }
  
     if (empty($prenom)) {
        $errors['prenom'] = "Prenom Required";
     }
  
     if (empty($email)) {
        $errors['email'] = "email Required";
     }

     if(empty($errors)){
            $res=$pdo->prepare("UPDATE `users` SET `nom`=:nom,`prenom`=:prenom,`email`=:email  WHERE id=:id");
            $res->execute([
                "nom"=>$nom,
                "prenom"=>$prenom,
                "email"=>$email,
                "id"=>$id
            ]);
            header("location:../index.php?message=User Updated");
     }
}

$res = $pdo->prepare("select id,nom,prenom,email from users where id=:id");
$res->execute([
    "id" => $id
]);
$user = $res->fetch();

if(!$user){
    header("location:../index.php"); 
}

//show:
$page_titel = "Update User";
$template = "UpdateUser";

include "../layout.phtml";

?>