<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Valide</title>
</head>
<body>

<?php

    include "db.php";
    $db = ConnexionBase();
    session_start();

  

if(isset($_POST['mail'],$_POST['pseudo'], $_POST['mdp1'], $_POST['mdp2'])){


    $mail = htmlspecialchars($_POST['mail']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp1 = htmlspecialchars($_POST['mdp1']);
    $mdp2 = htmlspecialchars($_POST['mdp2']);


    $check = $db->prepare("SELECT * FROM membres WHERE membres_mail =?");
    $check->execute([$mail]);
    $data = $check->fetch();

    $check2 = $db->prepare("SELECT * FROM membres WHERE membres_pseudo =?");
    $check2->execute([$pseudo]);
    $data2 = $check2->fetch();



    if(empty($_POST['pseudo'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
        $_SESSION['message5'] = 'Le champ pseudo est vide';
        header("Location: login_form.php");


//  ***************************************  VERIFICATION DU MAIL ******************************************************
    }elseif($data){
    header ('Location: login_form.php');
    $_SESSION['message6'] = "Vous etes déjà inscrit";

    }elseif($data2){
    header ('Location: login_form.php');
    $_SESSION['message7'] = "Le pseudo est déjà pris";

    } elseif(!preg_match("#^[A-Za-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$#",$_POST['mail'])){
        $_SESSION['message6'] = 'Le mail doit être conforme.';
        header("Location: login_form.php");


//  ***************************************  VERIFICATION DU PSEUDO ******************************************************


    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])){
        $_SESSION['message7'] = 'Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.';
        header("Location: login_form.php");


//  *************************  VERIFICATION DU NOMBRE DE CARACTERE DU MAIL *********************************************


    } elseif(strlen($_POST['mail'])>100){
    $_SESSION['message6'] = 'Le mail est trop long, il dépasse 100 caractères.';
    header("Location: login_form.php");


//  *************************  VERIFICATION DU NOMBRE DE CARACTERE DU PSEUDO *********************************************


    } elseif(strlen($_POST['pseudo'])>25){
        $_SESSION['message7'] = 'Le Pseudo est trop long, il dépasse 25 caractères.';
        header("Location: login_form.php");


//  ************************************  VERIFICATION DU MOT DE PASSE ***************************************************


    } elseif(empty($_POST['mdp1'])){
        $_SESSION['message8'] = "Le champ Mot de passe est vide.";
        header("Location: login_form.php");


    } elseif(empty($_POST['mdp2'])){
        $_SESSION['message8'] = "Le champ Mot de passe est vide.";
        header("Location: login_form.php");

    } elseif($mdp1 != $mdp2){
        $_SESSION['message8'] = "Les mots de passe doivent être similaire";
        header('Location: login_form.php');


    
    

//  *****************************  VERIFICATION DU PSEUDO SI DEJA UTILISÉ ************************************************


    } elseif($mdp1 == $mdp2){
        $password = password_hash($mdp1, PASSWORD_BCRYPT);

        $sql = "INSERT INTO membres(membres_mail, membres_pseudo, membres_mdp) VALUES ('$mail', '$pseudo', '$password')";

        $stmt= $db->prepare($sql);
        $stmt->execute([$mail, $pseudo, $password]);

        $_SESSION['message10'] = "Votre inscription a été pris en compte";
        header('location: connexion_form.php');
        }
    }
?>
</body>
</html>