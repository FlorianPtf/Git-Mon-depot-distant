<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion valide</title>
</head>
<body>
    
<?php

    include "db.php";
    $db = ConnexionBase();
    session_start();

    echo $_POST['mail'].'<br>';
    echo $_POST['mdp1'].'<br>';

    if(isset($_POST['mail'], $_POST['mdp1'])){
        
        $mail = htmlspecialchars($_POST['mail']);
        $mdp1 = htmlspecialchars($_POST['mdp1']);
        $password = password_hash($mdp1, PASSWORD_BCRYPT);


        $check = $db->prepare('SELECT membres_pseudo, membres_mail, membres_mdp FROM membres WHERE membres_mail = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                if(password_verify($mdp1, $data['membres_mdp']))
                {
                    $_SESSION['user'] = $data['membres_pseudo'];
                    header('Location: disc_index.php');
                }else header('Location: connexion_form.php');
                $_SESSION['message1'] = "Mot de passe incorrect";
            }else header('Location: connexion_form.php');
            $_SESSION['message1'] = "Email non conforme";
        }else header('Location: connexion_form.php');
        $_SESSION['message1'] = "Email incorrect";
    }else header('Location: connexion_form.php');
    ?>

</body>
</html>