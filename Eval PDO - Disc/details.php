<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Page Détail</title>
</head>
<body>

<br>

<?php 
    include "db.php";
    $db = ConnexionBase();

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

    <div class="container">
        <div class="row">
            <div class="col-11"> <h1>Détails</h1> <br> <hr></div>
            <div class="pull-right"><a href="deconnexion.php" id="Id_bouton10" type="button"
                    class="btn btn-danger btn-sm mb-2">Déconnexion</a> </div> 
        </div>



        <div class="row">
            <div class="col-5">
                <form action="#" method="post">
                    <div class="title">
                    <label for="Title">Title</label><br>
                    <input type="text" disabled="disabled" class="form" name="title" id="title" placeholder= "<?= $myArtist->disc_title; ?>">
                    </div>
                </div><br>

                <div class="col-5">
                    <div class="artist">
                        <label for="Artist">Artist</label><br>
                        <input type="text" disabled="disabled" class="form" name="artist" id="artist" placeholder= "<?= $myArtist->artist_name; ?>">
                    </div>
                </div><br>

                <div class="col-5">
                    <div class="year">
                        <label for="Year">Year</label><br>
                        <input type="text" disabled="disabled" class="form" name="year" id="year" placeholder= "<?= $myArtist->disc_year; ?>">
                    </div>
                </div><br>

                <div class="col-5">
                    <div class="genre">
                        <label for="Genre">Genre</label><br>
                        <input type="text" disabled="disabled" class="form" name="genre" id="genre" placeholder= "<?= $myArtist->disc_genre; ?>">
                    </div>
                </div><br>

                <div class="col-5">
                    <div class="label">
                        <label for="Label">Label</label><br>
                        <input type="text" disabled="disabled" class="form" name="label" id="label" placeholder= "<?= $myArtist->disc_label; ?>">
                    </div>
                </div><br>

                <div class="col-5">
                    <div class="price">
                        <label for="Price">Price</label><br>
                        <input type="text" disabled="disabled" class="form" name="price" id="price" placeholder= "<?= $myArtist->disc_price; ?>">
                    </div>
                </div><br>

                <div class="col-12">
                    <div class="picture">
                        <label for="Picture">Picture</label><br>
                        <img src="jaquettes/<?= $myArtist->disc_picture; ?>" alt="<?= $myArtist->disc_title; ?>"
                            title=" <?= $myArtist->disc_title; ?>" class="img-fluid" width="100%"> <br><br> 
                    </div>
                </div><br>
            </form>     
        </div>

        <div class="col-4">
            <div class="footerdetails">
                <a href="update_form.php?id=<?php echo $myArtist->disc_id; ?>" id="Btn1" class="btn btn-primary btn-sm mb-2">Modifier</a>
                <a href="#" id="Btn2" class="btn btn-primary btn-sm mb-2">Supprimer</a>
                <a href="index.php" id="Btn3" class="btn btn-primary btn-sm mb-2">Retour</a>



            <script>
                var bouton5 = document.getElementById("Btn2");
                bouton5.addEventListener("click", clickbtnnom);

                function clickbtnnom(event) {

                if (confirm("Voulez vous supprimer ce titre")) {
                    window.location.href = "delete_script.php?id=<?php echo $myArtist->disc_id; ?>";
                } else {
                    window.location.href = "index.php";
                }
                }
            </script>
            </div>
        </div>
    </div>
</body>
</html>


