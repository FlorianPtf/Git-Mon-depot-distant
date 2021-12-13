// **************************************************************************
// Exerice sur l'identification avec Nom / Prenom / Sexe / Message confirmation - Cours 5
// **************************************************************************

var bouton1 = document.getElementById("Id_bouton1");
bouton1.addEventListener("click", clickbtn1);

function clickbtn1(){

var nom = window.prompt("Entrez votre nom");
var prenom = window.prompt("Entrez votre prénom");

if (window.confirm("Etes-vous un homme ?") == true)
{ 
    var sexe = "Monsieur";
}
else {
    var sexe  = "Madame";
}

window.alert('Bonjour ' + sexe + ' ' + nom + ' ' + prenom + '\n' + 'Bienvenue sur notre site web !');
}


// **************************************************************************
// ******** Exercice sur les opérateurs / variables - Cours 6 ***************
// **************************************************************************

var bouton2 = document.getElementById("Id_bouton2");
bouton2.addEventListener("click", clickbtn2);

var a = "100" ; // Chaine de caracteres
var b = 100 ; // Nombre
var c = 1.00 ; // Décimal
var d = true ; // Booléen

function clickbtn2(){

alert("Ceci est une chaine de caractères: " + a);

alert("B avec l'opérateur de décrémentation est égal à : " + b--);

alert(c + a);
}

var bouton3 = document.getElementById("Id_bouton3");
bouton3.addEventListener("click", clickbtn3);

function clickbtn3()
{

if ((b < b-- ) == true)
{
    var d = true;
}
else {
    var d = false;
}

alert("La valeur de d est : " + d);
}


// **************************************************************************
// ************ Exercice sur la parité et l'âge - Cours 7 *******************
// **************************************************************************

var bouton4 = document.getElementById("Id_bouton4");
bouton4.addEventListener("click", clickbtn4);

function clickbtn4()
{
    var pair = window.prompt("Veuillez saisir un chiffre : ");
{
    if (pair%2 == 0)
        alert("Le nombre " + pair +" est pair !");
    else
        alert("Le nimbre " + pair +" est impair !");
}
}

var ddn = document.getElementById("ddn");
ddn.addEventListener("click", ddn);

    function fnCalculateAge(){

        var userDateinput = document.getElementById("ddn").value;  
        console.log(userDateinput);
        
        // convert user input value into date object
        var birthDate = new Date(userDateinput);
         console.log(" birthDate"+ birthDate);
        
        // get difference from current date;
        var difference=Date.now() - birthDate.getTime(); 
             
        var  ageDate = new Date(difference); 
        var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);

        if (calculatedAge >= 18)
            alert("Vous êtes majeur !");

        else if (calculatedAge < 18)
            alert("Vous êtes mineur !")

        else 
            alert("Veuillez renseigner votre âge ");
   }

   
// **************************************************************************
// ********************** LES BOUCLES - Cours 8 *****************************
// **************************************************************************


var bouton8 = document.getElementById("Id_bouton8");
bouton8.addEventListener("click", clickbtn8);

function clickbtn8(){

var np = 1 
var prenom = window.prompt("Saisissez le prénom N°" + np); 

if (prenom == true) 
{   
    resultat = prenom;

    window.alert("Le nombre de prenom inscrit sont " + np);
 
    np++; 
}
}


var bouton9 = document.getElementById("Id_bouton9");
bouton9.addEventListener("click", clickbtn9);

function clickbtn9(){

var entier = window.prompt("Veuillez entrez un chiffre");

while (entier > 0)
{
    resultat = entier - 1;

    console.log("Les nombres entiers inférieur sont :" + entier)

    entier--;
}
}


var bouton10 = document.getElementById("Id_bouton10");
bouton10.addEventListener("click", clickbtn10);

function clickbtn10(){

var entier1 = window.prompt("Veuillez entrez un premier chiffre")
var entier2 = window.prompt("Veuillez saisir un deuxième chiffre")
var entier3 = window.prompt("Veuillez saisir un troisième chiffre")
var entier4 = window.prompt("Veuillez saisir un quatrième chiffre")

resultat = parseInt(entier1) + parseInt(entier2) + parseInt(entier3) + parseInt(entier4);

window.alert("La somme des chiffres est : " + resultat);

window.alert("La moyenne des chiffres est : " + resultat / 4);
}


var bouton11 = document.getElementById("Id_bouton11");
bouton11.addEventListener("click", clickbtn11);

function clickbtn11(){

var multiple1 = window.prompt("Veuillez saisir un premier chiffre 'N' ")
var multiple2 = window.prompt("Veuillez saisir un deuxième chiffre 'X' ")

do {
     resultat = (multiple1 * multiple2);

     console.log("N x X est égal à " + resultat);

    multiple1++;
}
while (multiple1 < 5);
}


var bouton12 = document.getElementById("Id_bouton12");
bouton12.addEventListener("click", clickbtn12);

function clickbtn12(){

var voyelle = window.prompt("Veuillez saisir un mot")

    function compterNbVoyelles(mot) {
        var nbVoyelles = 0;
        for (i = 0; i < mot.length; i++) {
            var lettre = mot[i].toLowerCase();
            if ((lettre === "a") || (lettre === "e") || (lettre === "i") || (lettre ==="o") || (lettre === "u") || (lettre === "y")) {
                nbVoyelles ++;
            }
        }
        return nbVoyelles;
    }
     
    window.alert("le nombre de voyelles est : " + compterNbVoyelles(voyelle));
}


// **************************************************************************
// ********************** LES FONCTIONS - Cours 9 ***************************
// **************************************************************************


var bouton13 = document.getElementById("Id_bouton13");
bouton13.addEventListener("click", clickbtn13);

function clickbtn13(){

    var x = window.prompt("Veuillez entrer un chiffre")
    var y = window.prompt("Veuillez entrer un multiplicateur")

        function produit(x, y)
        {
        var resultat = x*y;
        return resultat;
    }

}


var bouton14 = document.getElementById("Id_bouton14");
bouton14.addEventListener("click", clickbtn14);

function clickbtn14(){


}

// **************************************************************************
// ********************** LES TABLEAUX - Cours 10 ***************************
// **************************************************************************


var bouton15 = document.getElementById("Id_bouton15");
bouton15.addEventListener("click", clickbtn15);

function clickbtn15(){

    var taille = window.prompt("Entrez le nombre de colonne souhaitez ")
    var myTableau = new Array();
    var i = 1;
    var n = 0;
    

    while (taille > 0) {
        var donné = window.prompt("Entrez la donnée N°" + i);
   
        myTableau[n] = [donné];

        taille--;

        i++;

        n++;

        donné++;
    }

    console.table(myTableau)
}



var bouton17 = document.getElementById("Id_bouton17");
bouton17.addEventListener("click", clickbtn17);

function clickbtn17(){

    var taille = window.prompt("Entrez le nombre de colonne souhaitez ")
    var myTableau2 = new Array();
    var m = 1;
    var n = 0;
    

    while (taille > 0) {
        var donné = window.prompt("Entrez la donnée N°" + m);
   
        myTableau2[n] = [donné];

        taille--;

        m++;

        n++;

        donné++;
    }

    function bubbleSort(items) {
        var length = items.length;  
        for (var i = 0; i < length; i++) { 
              for (var j = 0; j < (length - i - 1); j++) { 
                       if(items[j] > items[j+1]) {
                               var tmp = items[j]; 
                    items[j] = items[j+1]; 
                    items[j+1] = tmp; 
                }
            }        
        }
    }
    
    var arr = [donné]; 
    bubbleSort(arr);
    
    console.log(arr);
    console.table(myTableau2)
}



// **************************************************************************
// ********************** LES TABLEAUX - Cours 10 ***************************
// **************************************************************************




