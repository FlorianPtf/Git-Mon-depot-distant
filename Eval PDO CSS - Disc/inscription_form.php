<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    
<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();

?>
<div class="bg">
    <img src="asset/Music-bg3.jpg" id="bg" alt="">
</div>

<div class="containerLogin">

        <div class="center">
            <h1>Inscription</h1> <hr>
        </div>


        <div class="formulaire" name="inscription" id="inscription">

        <form action="inscription_script.php" method="post" autocomplete="off" enctype="multipart/form-data">


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
            <label for="pseudo">
                <span class="info" name="msginfo" id="msginfo">
            <?php        
            if(isset($_SESSION["message7"]))
            { 
                echo $_SESSION['message7'];
                unset($_SESSION['message7']);
            }
            ?>
        </span> 
            </label> <br>
                <input type="text" class="form" name="pseudo" id="pseudo" placeholder= "Renseigner votre pseudo " required>
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



        <div class="form-text">
            <label for="mdp2"></label> <br>
                <input type="password" class="form" name="mdp2" id="mdp2" placeholder= "Confirmer votre mot de passe " required>
        </div>




        <div class="col-4" name="footerD" id="footerD">
            <div class="footerdetails">
                <input type="submit" id="Btn1" class="Btn1" value="S'inscrire">
                <div class="connect_link">
                <a href="connexion_form.php" id="Btn2" class="Btn2">Déjà inscrit ? Cliquez ici</a>
            </div>
            </div>
        </div>
    </form>
</div>
</div>







</body>
</html>