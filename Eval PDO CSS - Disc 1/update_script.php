<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modification finalisé</title>
</head>
<body>
    
<?php 
     include "db.php";
     $db = ConnexionBase();
     session_start();

     $title = $_POST["updatetitle"];
     $artist = $_POST["updateartist"];
     $year1 = $_POST["updateyear"];
     $genre = $_POST["updategenre"];
     $label = $_POST["updatelabel"];
     $price1 = $_POST["updateprice"];
     $picture = $_FILES["file-uploadmodif"]['name'];
     $id1 = $_POST['updateid'];

    
     if (preg_match('/[a-zA-Z]/', $year1)) {
        $_SESSION['message3'] = 'Veuillez saisir une année valide';
        header("Location: update_form.php?id=$id1");
    }
    
    if (preg_match('/[a-zA-Z]/', $price1)) {
        $_SESSION['message4'] = 'Veuillez saisir un prix valide';
        header("Location: update_form.php?id=$id1");
    }
    
else {
    $dossier = 'uploads/';
    $fichier = basename($_FILES['file-uploadmodif']['name']);
    $taille_maxi = 1000000;
    $taille = filesize($_FILES['file-uploadmodif']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['file-uploadmodif']['name'], '.'); 
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
         if(move_uploaded_file($_FILES['file-uploadmodif']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
         {


// ********************* Formule poour l'envoi des données dans la Database *******************



        $sql2 = $db->prepare("UPDATE disc  JOIN artist ON disc.artist_id = artist.artist_id SET disc_title = :updatetitle, disc_year = :updateyear, disc_genre = :updategenre,
        disc_label = :updatelabel, disc_price = :updateprice, disc_picture = '$picture', artist_name = :updateartist WHERE disc_id = :updateid;");

    $sql2->bindValue(":updatetitle", $title, PDO::PARAM_STR);
    $sql2->bindValue(":updateyear", $year1, PDO::PARAM_INT);
    $sql2->bindValue(":updategenre", $genre, PDO::PARAM_STR);
    $sql2->bindValue(":updatelabel", $label, PDO::PARAM_STR);
    $sql2->bindValue(":updateprice", $price1, PDO::PARAM_INT);
    $sql2->bindValue(":updateartist", $artist, PDO::PARAM_STR);
    $sql2->bindValue(":updateid", $id1, PDO::PARAM_INT);


    $sql2->execute();
    $sql2->closeCursor();

        header("Location: disc_index.php"); 
         }
         else //Sinon (la fonction renvoie FALSE).
         {
               header("Location: update_form.php?id=$id1");
         }
    }
    else
    {
     header("Location: update_form.php?id=$id1");
    }

}
?>
</body>
</html>