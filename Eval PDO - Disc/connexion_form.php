<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
<br>

<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();

?>

<div class="containerConnect">

<div class="row">
    <div class="col-11"> <h1>Connexion</h1> <hr></div>
</div>


<div class="formulaire" name="connexion" id="connexion">

<form action="connexion_script.php" method="post" enctype="multipart/form-data">




<div class="form-text">
    <label for="mail">Mail :</label> <br>
        <input type="email" class="form" name="mail" id="mail" placeholder= "Renseigner votre mail " required>
</div>

<div class="form-text">
    <label for="mdp1">Mot de passe :</label> <br>
        <input type="password" class="form" name="mdp1" id="mdp1" placeholder= "Renseigner votre mot de passe " required>
</div>

<div class="col-4" name="footerD" id="footerD">
    <div class="footerdetails">
        <input type="submit" id="Btn10" class="btn btn-info btn-sm mb-2" value="Se connecter">
        <a href="login_form.php" id="Btn11" class="btn btn-warning btn-sm mb-2">Pas de compte ? Cliquez ici</a>
    </div>
</div>
</form>
</div>
</div>




</body>
</html>