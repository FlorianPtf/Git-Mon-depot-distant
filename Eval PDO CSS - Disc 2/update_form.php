<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modification</title>
</head>
<body>
    
<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();

    if (!isset($_SESSION['user'])) {
        header('location:inscription_form.php');
    }

    $requete1 = $db->query("SELECT * FROM artist");
    $requete1->execute();
    $tableau = $requete1->fetchAll(PDO::FETCH_OBJ);


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

<div class="bg">
    <img src="asset/Music-bg8.webp" id="bgupdate" alt="">

    <header>
        <div class="containerIndex">
              
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
    </header>

    <div class="containerUpdate">

        <div class="center">
            <h1>Modification</h1> <hr>
        </div>


        <div class="formulaire" name="update" id="update">

        <form action="update_script.php" method="post" autocomplete="off" enctype="multipart/form-data">


        <div class="form-text">
            <label for="updatetitle">
            </label>
                <input type="text" class="form" name="updatetitle" id="updatetitle" value="<?php echo $Modif->disc_title ?>" placeholder= "<?php echo $Modif->disc_title ?>" required>
        </div>



        <div class="form-group">
            <label for="updateartist">
            </label> <br>
            <select id="updateartist" name="updateartist" class="form-control">
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

            <input type="hidden" name="updateid" value="<?= $Modif->disc_id ?>">


        <div class="form-text">
            <label for="updateyear">
            </label> <br>
                <input type="text" class="form" name="updateyear" id="updateyear" value="<?php echo $Modif->disc_year ?>" placeholder= "<?php echo $Modif->disc_year ?>" required>
        </div>



        <div class="form-text">
            <label for="updategenre"></label> <br>
                <input type="text" class="form" name="updategenre" id="updategenre" value="<?php echo $Modif->disc_genre ?>" placeholder= "<?php echo $Modif->disc_genre ?>" required>
        </div>

        <div class="form-text">
            <label for="updatelabel"></label> <br>
                <input type="text" class="form" name="updatelabel" id="updatelabel" value="<?php echo $Modif->disc_label ?>" placeholder= "<?php echo $Modif->disc_label ?>" required>
        </div>




<!-- ********************************  PRICE  ******************************************** -->



        <div class="form-text">
            <label for="updateprice"></label><br>
                <input type="text" class="form" name="updateprice" id="updateprice" value="<?php echo $Modif->disc_price ?>" placeholder= "<?php echo $Modif->disc_price ?>" required>
        </div>




<!-- ********************************  PICTURE  ******************************************** -->


        <div class="Pictureupdate"> <br>  
        <label for="file-uploadmodif" id=fileUpload> <p>Choose file</p>
            <input type="file" class="form" name="file-uploadmodif" id="file-uploadmodif" onchange="previewPicture(this)" required>
        </label>       
             </div>
        <img src="#" alt="" id="image" style="max-width: 100px;">




        <div class="footerUpdate" name="footerUpdate" id="footerUpdate">
            <div class="footerupdate">
                <input type="submit" id="Btnupdate" class="Btnupdate" value="Modifier">
                <a href="disc_index.php" id="BtnBack" type="button" class="BtnBack">Retour</a>
            </div>
        </div>
    </form>
</div>
</div>



    <script type="text/javascript" >
    // L'image img#image
    var image = document.getElementById("image");
     
    // La fonction previewPicture
    var previewPicture  = function (e) {

        // e.files contient un objet FileList
        const [picture] = e.files

        // "picture" est un objet File
        if (picture) {
            // On change l'URL de l'image
            image.src = URL.createObjectURL(picture)
        }
    } 
</script>

</div>
</body>
</html>