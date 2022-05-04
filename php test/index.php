<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo PHP</title>


    <style>
        table, td, th { border: 1px solid black; }
        table { border-collapse: collapse; width:400px; }
        td { text-align:center; }
        p {
            display : flex;
            padding-left : 7rem;
        }

        /* div { display:flex;
            align-items:center;
            text-align :center;
        } */
    </style>
</head>
<body>
    
<?php
// *************************************************************************************************
// *********************************** Exercice 1 - LES BOUCLES ************************************
// *************************************************************************************************


$a = 1;

while ($a <150) {
    echo $a."  //  " ;
    $a++;
    $a++;
}

?>

<br><br>
 
<?php

// *************************************************************************************************
// ********************************* Exercice 1 - LES BOUCLES **************************************
// *************************************************************************************************


$b = 0;

while ($b < 10){
    echo "Je dois faire des sauvegardes régulières de mes fichiers <br>";
    $b++;
}

?>
<br>


<!-- // ********************************************************************************************
// ************************** Exercice 2 - TABLEAU MULTIPLICATION **********************************
// ************************************************************************************************* -->

<div class="Exo1"> 

<?php 
echo "<table border=\"1\">";

    $rows = 13;
    $colonnes = 13;

    echo '<p> Tableau de multiplication'.'</p>';

    $tm = array();
    for ($r = 0; $r < $rows; $r++){
        echo ('<tr>');

        for ($c = 0; $c < $colonnes; $c++)
         echo ('<td>' .$c*$r.'</td>');
         echo ('</tr>'); 

    }

    echo "</table>".'<br>';

// *************************************************************************************************
// ********************************** Exercice 3 - TABLEAU MOIS ************************************
// *************************************************************************************************

    echo "<table border=\"1\">";
    echo '<p> Calendrier 2022'.'</p>';

    $tab = array(
        "Janvier" => "31",
        "Février" => "29",
        "Mars" => "31",
        "Avril" => "30",
        "Mai" => "31",
        "Juin" => "30",
        "Juillet" => "31",
        "Aout" => "31",
        "Septembre" => "30",
        "Octobre" => "31",
        "Novembre" => "30",
        "Décembre" => "31"
    );
   

    
// ************************* Selection ARSORT pour trier selon nbre de jours ***********************

        arsort($tab);


// ************************************ Tableau MOIS ***********************************************


        echo ('<tr>');

        foreach($tab as $cle => $valeur) 
    { 
        echo ('<td>'.$cle.'</td>'); 
        echo ('<td>'.$valeur.'</td>');   
        echo ('</tr>');
    }   
        echo "</table>"; 
        
        ?>
    </div>

    <div class="Exo2"> 
<?php

// *************************************************************************************************
// ******************************** Exercice 4 - TABLEAU CAPITALES *********************************
// *************************************************************************************************

    echo "<table border=\"1\">";
    echo '<p>  Capitales classé par Capitales'.'</p>';

        $capitales = array(
            "Bucarest" => "Roumanie",
            "Bruxelles" => "Belgique",
            "Oslo" => "Norvège",
            "Ottawa" => "Canada",
            "Paris" => "France",
            "Port-au-Prince" => "Haïti",
            "Port-d'Espagne" => "Trinité-et-Tobago",
            "Prague" => "République tchèque",
            "Rabat" => "Maroc",
            "Riga" => "Lettonie",
            "Rome" => "Italie",
            "San José" => "Costa Rica",
            "Santiago" => "Chili",
            "Sofia" => "Bulgarie",
            "Alger" => "Algérie",
            "Amsterdam" => "Pays-Bas",
            "Andorre-la-Vieille" => "Andorre",
            "Asuncion" => "Paraguay",
            "Athènes" => "Grèce",
            "Bagdad" => "Irak",
            "Bamako" => "Mali",
            "Berlin" => "Allemagne",
            "Bogota" => "Colombie",
            "Brasilia" => "Brésil",
            "Bratislava" => "Slovaquie",
            "Varsovie" => "Pologne",
            "Budapest" => "Hongrie",
            "Le Caire" => "Egypte",
            "Canberra" => "Australie",
            "Caracas" => "Venezuela",
            "Jakarta" => "Indonésie",
            "Kiev" => "Ukraine",
            "Kigali" => "Rwanda",
            "Kingston" => "Jamaïque",
            "Lima" => "Pérou",
            "Londres" => "Royaume-Uni",
            "Madrid" => "Espagne",
            "Malé" => "Maldives",
            "Mexico" => "Mexique",
            "Minsk" => "Biélorussie",
            "Moscou" => "Russie",
            "Nairobi" => "Kenya",
            "New Delhi" => "Inde",
            "Stockholm" => "Suède",
            "Téhéran" => "Iran",
            "Tokyo" => "Japon",
            "Tunis" => "Tunisie",
            "Copenhague" => "Danemark",
            "Dakar" => "Sénégal",
            "Damas" => "Syrie",
            "Dublin" => "Irlande",
            "Erevan" => "Arménie",
            "La Havane" => "Cuba",
            "Helsinki" => "Finlande",
            "Islamabad" => "Pakistan",
            "Vienne" => "Autriche",
            "Vilnius" => "Lituanie",
            "Zagreb" => "Croatie"
        );

// ****************** Selection KSORT pour trier par ordre alphabétique (Capitales) ****************

        ksort($capitales); 
        
        echo ('<tr>');

        foreach($capitales as $cle => $valeur) 
    { 
        echo ('<td>'.$cle.'</td>'); 
        echo ('<td>'.$valeur.'</td>');   
        echo ('</tr>');
    }       
    
        echo "</table>";

// ********************** Selection KSORT pour trier par ordre alphabétique (Pays) *****************

    echo "<table border=\"1\">";
    echo '<p>  Capitales classé par Pays'.'</p>';

        asort($capitales); 
        
        echo ('<tr>');

        foreach($capitales as $cle => $valeur) 
    { 
        echo ('<td>'.$cle.'</td>'); 
        echo ('<td>'.$valeur.'</td>');   
        echo ('</tr>');
    }       
    
        echo "</table>".'<br>';


// ******************* Selection KSORT pour trier par ordre alphabétique (Pays) ********************

       $nb = count($capitales);
       echo"Le tableau contient " .$nb." Pays.".'<br>';
    

// ********************* Suppresion des capitales ne commençant pas par "B" (Pays) *****************



// *************************************************************************************************
// ***************************** Exercice 5 - TABLEAU DEPARTEMENTS *********************************
// *************************************************************************************************

$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);

    echo "<table border=\"1\">";
    echo '<p>  Départements'.'</p>';


    ksort($departements); 
            
    echo ('<tr>');

    foreach($departements as $cle => $valeur) 
    { 
    echo ('<td>'.$cle.'</td>');

    if(array_values($valeur)){
        foreach($valeur as $cle => $valeur)
        echo ('<td>'.$valeur.'</td>');   
        echo ('</tr>');
    }       
}

    echo "</table>";

// ************************* Départements par ordre alphabétique et le nombre *******************

    echo "<table border=\"1\">";
    echo '<p>  Départements'.'</p>';


    ksort($departements); 
            
    echo ('<tr>');

    foreach($departements as $cle => $valeur) 
    { 
    echo ('<td>'.$cle.'</td>');

        echo ('<td>'.(count($valeur)).'</td>');   
        echo ('</tr>');
        }       
    
    echo "</table>"."<br>";


// *************************************************************************************************
// ******************************** Exercice 6 - LES FONCTIONS  ************************************
// *************************************************************************************************

    function Lien()
    {
        echo ('<a href ="https://www.reddit.com/">"Reddit Hug"</a>');
    }

    Lien();

    echo "<br>"."<br>";

// ******************************* Fonction qui calcule la somme  **********************************

    $tableauS = array(4, 3, 8, 2);

    function Somme(){
        global $tableauS;
        echo ("La somme du tableau est de ".array_sum($tableauS));
    }

    Somme();

    echo "<br>"."<br>";

// ************************ Fonction qui véréfie la compléxité du MDP  ******************************


    $motdepasse = "MotDePasse1";                // Initialisation du mot de passe 

    function MDP(){
        global $motdepasse;
        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$#', $motdepasse))
            echo "True. Le mot de passe est valide";
        else
            echo "False. Le mot de passe est invalide";
    }

    MDP();

    echo '<br>'.'<br>';


// *************************************************************************************************
// ********************************** Exercice 7 - LES DATES  **************************************
// *************************************************************************************************

    function NombreSemaines(){

        $date1 = date_create("2019-01-01");
        $date2 = date_create("2019-07-14");
        $resultat1 = date_diff($date1, $date2);
       
        echo "Le nombre de jours depuis le début d année est de : ".$resultat1->format('%R%a days').'<br>';         
        $resultat2 = floor($resultat1->days / 7);
        echo "Le nombre de semaines depuis le début d année est de : ".$resultat2." semaines".'<br>'.'<br>';
    }

    NombreSemaines();


// ***************************** Jours avant la fin de la formation ********************************


    function NombreJours(){

        $dateaujd = new Datetime("NOW");
        $datefin = date_create("2022-04-15");

        $difference1 = date_diff($dateaujd, $datefin);

        echo $difference1->format('%R%a days').'<br>'.'<br>';
    }

    NombreJours();

// *************************** Déterminer si une année est bissextile *******************************


    function bissextile() {

        $annee = (2024);      //Année a définir !!
        if( (is_int($annee/4) && !is_int($annee/100)) || is_int($annee/400)) 
        {
            // Année bissextile
            echo "L année ".$annee. " est bissextile".'<br>'.'<br>';
        } else 
        {
            // Année NON bissextile
            echo "L année " .$annee. " n'est pas bissextile".'<br>'.'<br>';
        }
    }

    bissextile();


// ************************ Déterminer si une date est Valide ou Invalide **************************


    function DateErreur(){

        $dateerr =  DateTime::createFromFormat("d/m/Y", "32-17-2019");

        $errors = DateTime::getLastErrors();

        if ($errors["error_count"]>0 || $errors["warning_count"]>0) 
        {
            echo "La date est invalide !".'<br>'.'<br>';
        }
        else 
        {
            echo "La date est valide !".'<br>'.'<br>';
        }
    }

    DateErreur();


// ****************************** Afficher l'heure au format HH-MM ********************************

    function HeureAujd(){

        $HeureAujd = date("H:i");

        echo $HeureAujd.'<br>'.'<br>';

    }

    HeureAujd();


// ************************************* Ajout d'un mois *****************************************


    function AjoutMois()
    {

        $nextmonth = DateTime::createFromFormat("d/m/Y", "24-02-2022");
        $nextmonth = mktime(0, 0, 0, date("m")+1, date("d"), date("Y")); 
        echo date("d/m/Y" , $nextmonth).'<br>'.'<br>';
    }

       
    AjoutMois();

// ***************************** Date du 11 Septembre - 1000200000 *******************************

        function Date11Sept(){
            echo date("d/m/Y" , 1000200000).'<br>'.'<br>';
        }


        Date11Sept();



// *************************************************************************************************
// ******************************** Exercice 8 - LES FICHIERS  *************************************
// *************************************************************************************************

    $fp = fopen("/home/florian/Bureau/php test/Liens.txt", "r"); 

    
    while (!feof($fp))
    {
        $Ligne = fgets($fp, 4096);
        echo $Ligne.'<br>';
    }


    // echo ('<a href ="https://www.reddit.com/">"Reddit Hug"</a>');


    // echo ('<a href = "$Ligne">""</a>'.'<br>');


    // $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
    // $string = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $string);
    // echo $string;


// ******************************** Récupération fichier distant *********************************


// $lines = file('http://bienvu.net/misc/customers.csv');

// Affiche toutes les lignes du tableau comme code HTML, avec les numéros de ligne

// foreach ($lines as $line_num => $line) 


$row = 1;
if (($handle = fopen("/home/florian/Bureau/php test/customers.csv", "r")) !== FALSE) {

while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
{
    echo '<thead>';
        echo "<table border=\"1\">";
            echo "<th>Nom</th>";
            echo "<th>Prénom</th>";
            echo "<th>Email</th>";
            echo "<th>Téléphone</th>";
            echo "<th>Etat</th>";
            echo "<th>Ville</th>"."<br>";
       
    echo '<tr>';

    $num = count($data);
    $row++;
    for ($c=0; $c < $num; $c++) 
    {
    echo "<td>". $data[$c] . "<br>"."</td>";
    }

    
}
}
echo '</thead>';
echo '</tr>';
echo "</table>";




















?>



</div>
</body>
</html>