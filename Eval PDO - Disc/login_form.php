<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    
<br>

<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();

?>
<div class="containerLogin">

        <div class="row">
            <div class="col-11"> <h1>Inscription</h1> <hr></div>
        </div>


        <div class="formulaire" name="inscription" id="inscription">

        <form action="login_script.php" method="post" enctype="multipart/form-data">


        <div class="form-text">
            <label for="mail">Mail :
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
            <label for="pseudo">Pseudo :
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
            <label for="mdp1">Mot de passe :
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
            <label for="mdp2">Confirmer votre mot de passe :</label> <br>
                <input type="password" class="form" name="mdp2" id="mdp2" placeholder= "Confirmer votre mot de passe " required>
        </div>




        <div class="col-4" name="footerD" id="footerD">
            <div class="footerdetails">
                <input type="submit" id="Btn8" class="btn btn-info btn-sm mb-2" value="S'inscrire">
                <a href="connexion_form.php" id="Btn9" class="btn btn-warning btn-sm mb-2">Déjà inscrit ? Cliquez ici</a>
            </div>
        </div>
    </form>
</div>
</div>


















</body>
</html>