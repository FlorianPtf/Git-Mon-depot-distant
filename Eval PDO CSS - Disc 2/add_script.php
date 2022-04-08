<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout finalisé</title>
</head>
<body>
    
<?php 
     include "db.php";
     $db = ConnexionBase();
     session_start();

     $title = $_POST["addtitle"];
     $artist = $_POST["addartist"];
     $year = $_POST["addyear"];
     $genre = $_POST["addgenre"];
     $label = $_POST["addlabel"];
     $price = $_POST["addprice"];


     if (preg_match('/[a-zA-Z]/', $year)) {
          $_SESSION['message1'] = 'Veuillez saisir une année valide';
          header("Location: add_form.php");     
     }

     if (preg_match('/[a-zA-Z]/', $price)) {
          $_SESSION['message2'] = 'Veuillez saisir un prix valide';
          header("Location: add_form.php");
     }
    


    $dossier = 'uploads/';
    $fichier = basename($_FILES['file-upload']['name']);
    $taille_maxi = 1000000;
    $taille = filesize($_FILES['file-upload']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['file-upload']['name'], '.'); 
    //Début des vérifications de sécurité...
    if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
    {
          $_SESSION['message'] = 'Mauvais format';
          $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
    }
    if($taille>$taille_maxi)
    {
          $_SESSION['message'] = 'Fichier trop gros';
          $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
         //On formate le nom du fichier ici...
         $_SESSION['message'] = "";
         $fichier = strtr($fichier, 
              'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
              'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
         $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
         if(move_uploaded_file($_FILES['file-upload']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {


// ********************* Formule poour l'envoi des données dans la Database *******************


          $title = $_POST["addtitle"];
          $artist = $_POST["addartist"];
          $year = $_POST["addyear"];
          $genre = $_POST["addgenre"];
          $label = $_POST["addlabel"];
          $price = $_POST["addprice"];
          $picture = $_FILES["file-upload"]['name'];
      
      
           $sql = "INSERT INTO disc (disc_title, disc_year, disc_label, disc_genre, disc_price, artist_id, disc_picture) 
                VALUES ('$title', '$year', '$label', '$genre', '$price', '$artist', '$picture')";
      
           $stmt= $db->prepare($sql);
           $stmt->execute([$title, $year, $label, $genre, $price]);


              header("Location: disc_index.php");
         }
         else //Sinon (la fonction renvoie FALSE).
         {
               header("Location: add_form.php");
         }
    }
    else
    {
     header("Location: add_form.php");
    }
    
?>

</body>
</html>