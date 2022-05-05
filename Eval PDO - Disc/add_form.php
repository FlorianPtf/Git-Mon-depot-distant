<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ajout</title>
</head>
<body>
    
<br>

<?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();

    if (!isset($_SESSION['user'])) {
        header('location:login_form.php');
    }

    $requete1 = $db->query("SELECT * FROM artist");
    $requete1->execute();
    $tableau = $requete1->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container">
        <div class="row">
            <div class="col-11"> <h1>Le formulaire d'ajout</h1> <br> <hr></div>
            <div class="pull-right"><a href="deconnexion.php" id="Id_bouton10" type="button"
                    class="btn btn-danger btn-sm mb-2">Déconnexion</a> </div> 
        </div>

        <div class="row">
            <div class="col-11"> <h3>Ajouter un vinyle</h3></div>
        </div>


<!-- ****************************  DEBUT FORMULAIRE  ************************************** -->


        <div class="row">
            <div class="col-8">
            <form action="add_script.php" method="post" enctype="multipart/form-data">

<!-- ********************************  TITLE  ******************************************** -->



        <div class="form-text">
            <label for="title">Title :</label> <br>
                <input type="text" class="form" name="title" id="title" placeholder= "Enter title " required>
        </div>




<!-- ********************************  ARTIST  ******************************************** -->




        <div class="form-group">
            <label for="artist">Artist :
                <span class="info" name="msginfo" id="msginfo">
            </label> <br>
                <select id="artist" name="Artist" class="form-control">
                    <?php foreach ($tableau as $data){ ?>
                    <option value="<?= $data->artist_id ?> " required> <?= $data->artist_name; ?>  </option>
                    <?php } ?>
                </select>
        </div>






<!-- ********************************  YEAR  ******************************************** -->




        <div class="form-text">
            <label for="year">Year :
                <span class="info" name="msginfo" id="msginfo">
                    <?php        
                        if(isset($_SESSION["message1"]))
                        { 
                            echo $_SESSION['message1'];
                            unset($_SESSION['message1']);
                        }
                    ?>
            </label> <br>
                <input type="text" class="form" name="year" id="year" placeholder= "Enter year" required>
        </div>





<!-- ********************************  GENRE  ******************************************** -->



        <div class="form-text">
            <label for="genre">Genre :</label> <br>
                <input type="text" class="form" name="genre" id="genre" placeholder= "Enter genre (Rock, Pop, Prog ...)" required>
        </div>




<!-- ********************************  LABEL  ******************************************** -->




        <div class="form-text">
            <label for="label">Label :</label> <br>
                <input type="text" class="form" name="label" id="label" placeholder= "Enter label (EMI, Warner, PolyGram, Univers Sale...)" required>
        </div>




<!-- ********************************  PRICE  ******************************************** -->



        <div class="form-text">
            <label for="price">Price :
                <span class="info" name="msginfo" id="msginfo">
                <?php        
                    if(isset($_SESSION["message2"]))
                    { 
                        echo $_SESSION['message2'];
                        unset($_SESSION['message2']);
                    }
                ?>
            </label> <br>
                <input type="text" class="form" name="price" id="price" placeholder= "" required>
        </div>




<!-- ********************************  PICTURE  ******************************************** -->


        <div class="Picture">
            <p> Picture :</p>
       
        <label for="file-upload" id=fileUpload>
            <input type="file" class="form" name="file-upload" id="file-upload" onchange="previewPicture(this)" required>
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
  <img src="#" alt="" id="image" style="max-width: 200px;">

<!-- ********************************  FOOTER  ********************************************** -->

        <div class="col-4" name="footerD" id="footerD">
            <div class="footerdetails">
                <input type="submit" id="Btn4" class="btn btn-primary btn-sm mb-2" value="Ajouter">
                <a href="index.php" id="Btn5" class="btn btn-primary btn-sm mb-2">Retour</a>
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