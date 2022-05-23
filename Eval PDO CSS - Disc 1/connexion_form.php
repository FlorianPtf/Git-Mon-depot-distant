<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    
<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();

?>
<div class="bg">
    <img src="asset/Music-bg5.jpeg" id="bg2" alt="">
</div>

<div class="containerConnect">

        <div class="center">
            <h1>Connexion</h1> <hr>
        </div>


        <div class="formulaire" name="inscription" id="inscription">

        <form action="connexion_script.php" method="post" autocomplete="off" enctype="multipart/form-data">


        <div class="form-text">
            <label for="mail">
                <span class="info" name="msginfo" id="msginfo">
            <?php        
            if(isset($_SESSION["message6"]))
            { 
                echo $_SESSION['message6'];
                unset($_SESSION['message6']);
            }
            ?>
        </span> 
            </label> <br>
                <input type="email" class="form" name="mail" id="mail" placeholder= "Renseigner votre mail " required>
        </div>


        <div class="form-text">
            <label for="mdp1">
                <span class="info" name="msginfo" id="msginfo">
            <?php        
            if(isset($_SESSION["message8"]))
            { 
                echo $_SESSION['message8'];
                unset($_SESSION['message8']);
            }
            ?>
        </span> 
            </label> <br>
                <input type="password" class="form" name="mdp1" id="mdp1" placeholder= "Renseigner votre mot de passe " required>
        </div>




        <div class="col-4" name="footerD" id="footerD">
            <div class="footerdetails">
                <input type="submit" id="Btn3" class="Btn3" value="Se connecter">
                <div class="connect_link">
                <a href="inscription_form.php" id="Btn4" class="Btn4">Pas de compte ? Cliquez ici</a>
            </div>
            </div>
        </div>
    </form>
</div>
</div>







</body>
</html>