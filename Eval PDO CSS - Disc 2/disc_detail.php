<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Disc Details</title>
</head>
<body>
    
<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();

    if (!isset($_SESSION['user'])) {
        header('location:inscription_form.php');
    }

        // On récupère l'ID passé en paramètre :
        $id = $_GET["id"];

        // On crée une requête préparée avec condition de recherche :
        $requete = $db->prepare("SELECT * FROM artist JOIN disc ON disc.artist_id = artist.artist_id WHERE disc_id=?");
        // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :

        $requete->execute(array($id));
    
        // on récupère le 1e (et seul) résultat :
        $myArtist = $requete->fetch(PDO::FETCH_OBJ);
    
        // on clôt la requête en BDD
        $requete->closeCursor();

?>

    <div class="bgdetails">
            <header>
                <div class="containerDetails">
                
            
                    
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


            <div class="detailstitre">
                <ul class="detailsul">
                    <li class="liartist"> ARTIST : <?php echo $myArtist->artist_name; ?></li>
                    <li class="lititre"> TITRE : <?php echo $myArtist->disc_title; ?></li>
                    <li class="lilabel"> LABEL : <?php echo $myArtist->disc_label; ?></li>
                </ul>
                <ul class="detailslogo">
                    <li class="lipencil"> <a href="update_form.php?id=<?php echo $myArtist->disc_id; ?>" id="BtnUpdate"> <i class="fa-solid fa-pencil" id="detailsupdate"></i> </a> <p class="detailsmodifier"> Modifier </p> </li>
                    <li class="litrash"> <a href="#" id="BtnDelete"> <i class="fa-solid fa-trash" id="detailsdelete"></i> </a> <p class="detailssupprimer"> Supprimer </p> </li>
                </ul>   

                <img src="jaquettes/<?= $myArtist->disc_picture; ?>" alt="<?= $myArtist->disc_title; ?>"
                            title=" <?= $myArtist->disc_title; ?>" id="detailsimg">
            </div>

            <div class="footerdetails">
                <div class="bande">
                    <span class="bandetop"></span>
                </div>
                <div class="bande2">
                    <span class="bandebot"></span>
                </div>
            </div>            
        </div>

    <script src="https://kit.fontawesome.com/c1bbff1c35.js" crossorigin="anonymous"></script>
    <script>
            var bouton5 = document.getElementById("BtnDelete");
            bouton5.addEventListener("click", clickbtnnom);

            function clickbtnnom(event) {

            if (confirm("Voulez vous supprimer ce titre")) {
                window.location.href = "delete_script.php?id=<?php echo $myArtist->disc_id; ?>";
            } else {
                window.location.href = "disc_index.php";
            }
            }
</script>
</body>
</html>