<?php

require_once('../db_connect/index.php');
$errors = [];
$nom = "";
$prenom = "";
$email = "";
$password = "";

if (isset($_POST['submit'])) {

    $date = date('Y-m-d');
    $token = md5($email) . mt_rand(999, 999999);
    $verified=0;
    $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   if (empty($nom)) {
      $errors['nom'] = "Nom Required";
   }

   if (empty($prenom)) {
      $errors['prenom'] = "Prenom Required";
   }

   if (empty($email)) {
      $errors['email'] = "email Required";
   }

   if (empty($password)) {
      $errors['password'] = "password Required";
   }


   if (empty($errors)) {
      $user_email = $pdo->prepare("select * from users where email=:email");
      $user_email->execute([
         "email" => $email
      ]);

      $verify = $user_email->fetchAll();
      if (count($verify) == 0) {
         $user = $pdo->prepare("INSERT INTO `users`( `nom`, `prenom`, `email`, `password`) VALUES (:nom,:prenom,:email,:pass)");
         $user->execute([
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "pass" => password_hash($password, PASSWORD_DEFAULT)
         ]);
         header("location:../index.php?message=User Added");
      } else {
         $errors['email'] = "Email Already exist";
      }
   }

}



$page_titel = "Create An Account";
$template = "signup";
$show = true;
include "../layout.phtml";
