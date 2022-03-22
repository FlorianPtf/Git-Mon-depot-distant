<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>La Liste</title>
</head>

<body>

    <?php 
    include "db.php";
    $db = ConnexionBase();
    session_start();
    $cd = 0;

    if (!isset($_SESSION['user'])) {
        header('location:login_form.php');
    }
?>
    <br>

        <div class="container">
            <?php 
                $requete1 = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
                $requete1->execute();
                $tableau = $requete1->fetchAll(PDO::FETCH_OBJ);
                foreach ($tableau as $data)
                {$cd++;}?>

        <div class="row">
            <div class="col-11">
                <h1>Liste des disques (<?php echo $cd; ?>)</h1>
            </div>
            <div class="pull-right"><a href="add_form.php" id="Id_bouton1" type="button"
                    class="btn btn-primary btn-sm mb-2">Ajouter</a> </div>
            <div class="pull-right"><a href="deconnexion.php" id="Id_bouton10" type="button"
                    class="btn btn-danger btn-sm mb-2">Déconnexion</a> </div>
        </div>
        <hr>

        <div class="row">
            <?php 
                    $requete1 = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
                    $requete1->execute();
                    $tableau = $requete1->fetchAll(PDO::FETCH_OBJ);
                    foreach ($tableau as $data){
                    $cd++;?>


            <div class="card mb-3 col-12 col-md-6 border-0" style="max-width: 450px;">
                <div class="row no-gutters">
                    <div class="col-5">
                        <a href="details.php?id=<?php echo $data->disc_id; ?>">
                        <img src="jaquettes/<?= $data->disc_picture; ?>" alt="<?= $data->disc_title; ?>"
                            title=" <?= $data->disc_title; ?>" class="img-fluid"> </a><br><br>
                    </div>

                    <div class="col-7">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data->disc_title; ?> </h5>
                            <h6 class="car-subtitle"><?= $data->artist_name; ?> </h6>
                            <p class="card-text">Label : <?= $data->disc_label; ?>  </p>
                            <p>Year : <?= $data->disc_year; ?> </p>
                            <p>Genre : <?= $data->disc_genre; ?></p>
                            <a href="details.php?id=<?php echo $data->disc_id; ?>" id="Btn_details" class="btn btn-primary btn-sm mb-2">Details</a>



                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    </div>
</body>

</html>