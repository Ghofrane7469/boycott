<?php 
 
   require_once('./db_connect/index.php');
 
   $user_deleted=$pdo->prepare("Delete from users where id=:id_user");
   $user_deleted->execute(
        [
            "id_user"=>$_GET["id"]
        ]
    );
   
    header("location:index.php?message=User Deleted");

?>