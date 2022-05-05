<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>About Us</title>
</head>
<body>
    
<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();
    $cd = 0;

    if (!isset($_SESSION['user'])) {
        header('location:inscription_form.php');
    }
?>

    <div class="bgindex">
        <div class="bg">
            <img src="asset/astronaut.webp" id="bg3" alt="">
        </div>
    
    <header>
        <div class="containerIndex">
            <?php 
                $requete1 = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
                $requete1->execute();
                $tableau = $requete1->fetchAll(PDO::FETCH_OBJ);
                foreach ($tableau as $data)
                {$cd++;}?>
              
        <div class="navbar">  
                <a href="#" id="Liste"> <img src="asset/Velvet_Records 1.png" title="Velvet Records" alt="Velvet Records"> 
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </a>  
            <ul>
                <li> <a href="disc_index.php" id="Btn5" type="button"
                class="Btn5">Home</a></li>
                <li> <a href="deconnexion.php" id="BtnDeco" type="button"
                class="BtnDeco">Disconnect</a></li>
            </ul>
        </div>
        </div>
    </header>

        <div class="containerabout">
            <div class="aboutlogo">
                <img src="asset/Velvet_Records 2.png" title="Logo Velvet Records" alt="Logo Velvet Records" id="LogoFly">
            </div>
            
        <div class="abouttext">
            <h4>About Velvet Records</h4> <hr>
            <p>Velvet Records est un site collaboratif qui permet de répertorier tout disques et artistes 
                de n'importe quelle générations.</p>

            <p>Site participatif depuis plusieurs décennies, vous pourrez y retrouver tous vos artistes préféré
                de n'importe quel genre musical.</p>

            <p>Vous ne parvenez pas à trouver votre musique préférée, inscrivez là !</p>

        </div>
        </div>
    </div>

    <script>
    var logofly = document.getElementById("LogoFly");
    logofly.addEventListener("mouseover", logochange);

    function logochange(){
    setTimeout(function(logochange){window.location.href = "disc_index.php"; }, 4800);
    }
    </script>


</body>
</html>