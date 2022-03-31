<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us Script</title>
</head>
<body>
<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();
    $cd = 0;

    // if (!isset($_SESSION['user'])) {
    //     header('location:inscription_form.php');
    // }




          $mail = $_POST["mail"];
          $pseudo = $_POST["pseudo"];
          $msg = $_POST["contactmsg"];
      
      
           $sql = "INSERT INTO contact (contact_mail, contact_pseudo, contact_message) 
                VALUES ('$mail', '$pseudo', '$msg')";
      
           $stmt= $db->prepare($sql);
           $stmt->execute([$mail, $pseudo, $msg]);


              header("Location: disc_index.php");



?>







</body>
</html>