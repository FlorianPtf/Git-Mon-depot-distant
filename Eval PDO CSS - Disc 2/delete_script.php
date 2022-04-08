<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Suprression</title>
</head>
<body>


<br>

<?php
    include "db.php";
    $db = ConnexionBase();
    session_start();

if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0){
    header("Location: disc_index.php");
}

try {
        $requete = $db->prepare("DELETE FROM disc where disc_id= ?");
        $requete->execute(array($_GET["id"]));
        $requete->execute();
        $requete->closeCursor();
        header("Location: disc_index.php");
}
catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_artist_modif.php)");
}



?>

</body>
</html>