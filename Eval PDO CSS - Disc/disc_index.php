<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>La Liste</title>
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
            <img src="asset/Music-bg3.jpg" id="bg3" alt="">
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
                <li> <a href="add_form.php" id="Btn5" type="button"
                class="Btn5">Ajouter</a></li>
                <li> <a href="deconnexion.php" id="BtnDeco" type="button"
                class="BtnDeco">Déconnexion</a></li>
            </ul>
        </div>
    </header>

        <div class="intro">
            <h2> LISTE DES DISQUES - <?php echo $cd; ?> </h2> <hr>
        </div>

    <div class="containerCard">
        <?php $requete1 = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
                    $requete1->execute();
                    $tableau = $requete1->fetchAll(PDO::FETCH_OBJ);
                    foreach ($tableau as $data){
                    $cd++;?>
        <div class="card">
            <div class="imgbx">
            <a href="disc_detail.php?id=<?php echo $data->disc_id; ?>">
                        <img src="jaquettes/<?= $data->disc_picture; ?>" alt="<?= $data->disc_title; ?>"
                            title=" <?= $data->disc_title; ?>" class="img-fluid"> </a>
            </div>
            <div class="content">  
                <h2 class="card-title"><?= $data->disc_title; ?> </h2>     
                <h3 class="car-subtitle"><?= $data->artist_name; ?> </h3>
                        <p class="card-text">Label : <?= $data->disc_label; ?>  </p>
                        <p><?= $data->disc_year; ?> | <?= $data->disc_genre; ?></p>
                        <a href="details.php?id=<?php echo $data->disc_id; ?>" id="Btn_details" class="Btn_details">Details</a>       
            </div>
        </div>



        <?php } ?>
</div>
        
    </div>
    </div>
</div>
</body>
</html>