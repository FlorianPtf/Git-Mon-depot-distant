<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
</head>
<body>
    
<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();
    $cd = 0;

    // if (!isset($_SESSION['user'])) {
    //     header('location:inscription_form.php');
    // }
?>


<div class="bgindex">
        <div class="bg">
            <img src="asset/Music-bg7.jpg" id="bg4" alt="">
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
                class="BtnDeco">Déconnexion</a></li>
            </ul>
        </div>
    </header>

    <div class="containercontact">

        <div class="centermsg">
            <h1>Contact</h1> <hr>
        </div>


        <div class="formulaire" name="contact" id="contact">

        <form action="contact_script.php" method="post" autocomplete="off" enctype="multipart/form-data">


        <div class="form-text">
            <label for="mail">
            </label> <br>
                <input type="email" class="form" name="mail" id="mail" placeholder= "Renseigner votre mail " required>
        </div>



        <div class="form-text">
            <label for="pseudo">
            </label> <br>
                <input type="text" class="form" name="pseudo" id="pseudo" placeholder= "Renseigner votre pseudo " required>
        </div>



        <div class="form-text">
            <br>
                <textarea class="form-area" name="contactmsg" id="contactmsg" placeholder="Votre message... " required></textarea>
        </div>




            <div class="footercontact">
                <button class="selectnone" value="submit">
                    <span tabindex="0">Envoyez</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewbox="0 0 24 24">
                        <path d="M0 11c2.761.575 6.312 1.688 9 3.438 3.157-4.23 8.828-8.187 15-11.438-5.861 5.775-10.711 12.328-14 18.917-2.651-3.766-5.547-7.271-10-10.917z"/>
                    </svg>
                </button>
            </div>
    </form>
    </div>
    </div>
</body>
</html>
