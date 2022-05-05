<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout</title>
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

?>

<div class="bg">
    <img src="asset/Music-bg8.webp" id="bgadd" alt="">

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

    <div class="containerAdd">

        <div class="center">
            <h1>Ajout</h1> <hr>
        </div>


        <div class="formulaire" name="ajout" id="ajout">

        <form action="add_script.php" method="post" autocomplete="off" enctype="multipart/form-data">


        <div class="form-text">
            <label for="addtitle">
            </label>
                <input type="text" class="form" name="addtitle" id="addtitle" placeholder= "Enter title " required>
        </div>



        <div class="form-group">
            <label for="addartist">
            </label> <br>
            <select id="addartist" name="addartist" class="form-control">
                    <?php foreach ($tableau as $data){ ?>
                    <option value="<?= $data->artist_id ?> " required> <?= $data->artist_name; ?>  </option>
                    <?php } ?>
                </select>        
            </div>



        <div class="form-text">
            <label for="addyear">
            </label> <br>
                <input type="text" class="form" name="addyear" id="addyear" placeholder= "Enter year " required>
        </div>



        <div class="form-text">
            <label for="addgenre"></label> <br>
                <input type="text" class="form" name="addgenre" id="addgenre" placeholder= "Enter genre (Rock, Pop, Prog...)" required>
        </div>

        <div class="form-text">
            <label for="addlabel"></label> <br>
                <input type="text" class="form" name="addlabel" id="addlabel" placeholder= "Enter label (EMI, Warner, PolyGram, Univers Sale...)" required>
        </div>




<!-- ********************************  PRICE  ******************************************** -->



        <div class="form-text">
            <label for="addprice"></label><br>
                <input type="text" class="form" name="addprice" id="addprice" placeholder= "Enter Price" required>
        </div>




<!-- ********************************  PICTURE  ******************************************** -->


        <div class="PictureAdd">     <br>  
        <label for="file-upload" id=fileUpload> <p>Choose file</p>
            <input type="file" class="form" name="file-upload" id="file-upload" onchange="previewPicture(this)" required>
        </label>       
             </div>
        <img src="#" alt="" id="image" style="max-width: 100px;">




        <div class="footerAdd" name="footerAdd" id="footerAdd">
            <div class="footeradd">
                <input type="submit" id="Btnadd" class="Btnadd" value="Ajouter">
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