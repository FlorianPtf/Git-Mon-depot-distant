<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Modification</title>
</head>
<body>

<br>

<?php
    include "db.php";
    $db = ConnexionBase();
    session_start();

   // On récupère l'ID passé en paramètre :
        $id = $_GET["id"];

        // On crée une requête préparée avec condition de recherche :
        $requete = $db->prepare("SELECT * FROM artist JOIN disc ON disc.artist_id = artist.artist_id WHERE disc_id=?");
        // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :

        $requete->execute(array($id));
    
        // on récupère le 1e (et seul) résultat :
        $Modif = $requete->fetch(PDO::FETCH_OBJ);
    
        // on clôt la requête en BDD
        $requete->closeCursor();
?>

<div class="container">
        <div class="row">
            <div class="col-11"> <h1>Le formulaire de modification</h1> <br> <hr></div>
            <div class="pull-right"><a href="deconnexion.php" id="Id_bouton10" type="button"
                    class="btn btn-danger btn-sm mb-2">Déconnexion</a> </div> 
        </div>

        <div class="row">
            <div class="col-11"> <h3>Modifier un vinyle</h3></div>
        </div>


<!-- ****************************  DEBUT FORMULAIRE  ************************************** -->


        <div class="row">
            <div class="col-8">
            <form action="update_script.php" method="post" enctype="multipart/form-data">

<!-- ********************************  TITLE  ******************************************** -->



        <div class="form-text">
            <label for="title">Title :</label> <br>
                <input type="text" class="form" name="title" id="title" value="<?php echo $Modif->disc_title ?>" placeholder= "<?php echo $Modif->disc_title ?>" required>
        </div>



<!-- ********************************  ARTIST  ******************************************** -->


        <div class="form-group">
            <label for="artist">Artist :</label> <br>
                <select id="artist" name="Artist" class="form-control">
                <option value="<?php echo $Modif->artist_name ?>" selected><?php echo $Modif->artist_name ?></option>
                    <?php 
                     $requete1 = $db->query("SELECT * FROM artist");
                     $requete1->execute();
                     $tableau = $requete1->fetchAll(PDO::FETCH_OBJ);
                 
                    
                    foreach ($tableau as $data){ ?>
                    <option value="<?=$data->artist_id ?>"> <?=$data->artist_name;?> </option>
                    <?php } ?>
                </select>
        </div>


            <input type="hidden" name="id" value="<?= $Modif->disc_id ?>">



<!-- ********************************  YEAR  ******************************************** -->



        <div class="form-text">
            <label for="year">Year :
                <span class="info" name="msginfo" id="msginfo">
                    <?php        
                        if(isset($_SESSION["message3"]))
                        { 
                            echo $_SESSION['message3'];
                            unset($_SESSION['message3']);
                        }
                    ?>
            </label> <br>
                <input type="text" class="form" name="year" id="year" value="<?php echo $Modif->disc_year ?>" placeholder= "<?php echo $Modif->disc_year ?>" required>
        </div>



<!-- ********************************  GENRE  ******************************************** -->


        <div class="form-text">
            <label for="genre">Genre :</label> <br>
                <input type="text" class="form" name="genre" id="genre" value="<?php echo $Modif->disc_genre ?>" placeholder= "<?php echo $Modif->disc_genre ?>" required>
        </div>




<!-- ********************************  LABEL  ******************************************** -->



        <div class="form-text">
            <label for="label">Label :</label> <br>
                <input type="text" class="form" name="label" id="label" value="<?php echo $Modif->disc_label ?>" placeholder= "<?php echo $Modif->disc_label ?>" required>
        </div>




<!-- ********************************  PRICE  ******************************************** -->



        <div class="form-text">
            <label for="price">Price :
                <span class="info" name="msginfo" id="msginfo">
                <?php        
                    if(isset($_SESSION["message4"]))
                    { 
                        echo $_SESSION['message4'];
                        unset($_SESSION['message4']);
                    }
                ?>
            </label> <br>
                <input type="text" class="form" name="price" id="price" value="<?php echo $Modif->disc_price ?>" placeholder= "<?php echo $Modif->disc_price ?>" required>
        </div>



<!-- ********************************  PICTURE  ******************************************** -->


        <div class="Picture">
            <p> Picture :</p>
       
        <label for="file-uploadmodif" id=fileUploadmodif>
            <input type="file" class="form" name="file-uploadmodif" id="file-uploadmodif" required>
        <span class="info" name="msginfo" id="msginfo">
            <?php        
            if(isset($_SESSION["message"]))
            { 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </span>
        </label>
        </div>


        <div class="col-12">
                    <div class="picture">
                        <img src="jaquettes/<?= $Modif->disc_picture; ?>" alt="<?= $Modif->disc_title; ?>"
                            title="<?= $Modif->disc_title; ?>" class="img-fluid" width="75%"> <br><br> 
                    </div>
                </div><br>



<!-- ********************************  FOOTER  ********************************************** -->


        <div class="col-4" name="footerD" id="footerD">
            <div class="footerdetails">
            <a href="update_script.php?id=<?php echo $Modif->disc_id; ?>" ><input type="submit" id="Btn6" class="btn btn-primary btn-sm mb-2" value="Modifier"></a> 
                <a href="index.php" id="Btn7" class="btn btn-primary btn-sm mb-2">Retour</a>
            </div>
        </div>
        

    </form>
    </div>
    </div>


</div>
</body>
</html>