<?php

require_once('../db_connect/index.php');


//if(array_key_exists('submit',$_POST)){

//  if(!empty($_POST)){
$errors = [];
$nom = "";
$prenom = "";
$email = "";
$password = "";

if (array_key_exists('submit', $_POST)) {
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

   // if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($password)){

   // }

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

$page_titel = "Add User";
$template = "addUser";

include "../layout.phtml";