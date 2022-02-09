// **************************************************************************
// *************************** EXERCICE 1 ***********************************
// **************************************************************************


var bouton1 = document.getElementById("Id_bouton1");
bouton1.addEventListener("click", clickbtn1);

function clickbtn1(){

    var jeunes=0;
    var moyens=0;
    var vieux =0;
    var personnes;

        do {
            personnes = window.prompt("Veuillez saisir l'âge");

        if (( personnes <20) && (personnes >0 )) {
            jeunes++;
            console.log(personnes);
        }
        else if ((personnes >=40 ) && (personnes <=100)) {
            vieux++;
            console.log(vieux);
        }
        else {
            moyens++;
            console.log(moyens);
        }
    }   
        while (personnes < 100);
 
    window.alert("Nombres de jeunes : " + jeunes + "\n" + "Nombres de moyens : " + moyens + "\n" + "Nombres de vieux : " + vieux + "\n" + "Nombres de centenaire : " + 1);
} 


// **************************************************************************
// *************************** EXERCICE 2 ***********************************
// **************************************************************************


var bouton2 = document.getElementById("Id_bouton2");
bouton2.addEventListener("click", clickbtn2);

function clickbtn2(){

    var TableMultiplication = window.prompt("Veuillez choisir la table de multiplication");
    var i = 1;

    while (i <=10)
    {
        resultat = TableMultiplication * i;

        console.log (i + " x " + TableMultiplication + " = " + resultat);

        i++;
    }
}

// **************************************************************************
// *************************** EXERCICE 3 ***********************************
// **************************************************************************


var bouton3 = document.getElementById("Id_bouton3");
bouton3.addEventListener("click", clickbtn3);

function clickbtn3(){

    var tableau = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
    var prenom = window.prompt("Veuillez saisir un prénom");

        if ((prenom === "Audrey") || (prenom === "Aurélien") || (prenom === "Flavien") || (prenom === "Jérémy") || (prenom === "Laurent") || 
            (prenom === "Melik") || (prenom === "Nouara") || (prenom === "Salem") || (prenom === "Samuel") || (prenom === "Stéphane")){

                var suppression = tableau.indexOf(prenom);
                push = tableau.push(" ");
                splice = tableau.splice(suppression, 1);
                console.log(tableau);
            }

        else {
            window.alert("Le prénom saisi ne fait pas parti de la liste, veuillez réessayer")
            }   
}

// **************************************************************************
// *************************** EXERCICE 4 ***********************************
// **************************************************************************


var bouton4 = document.getElementById("Id_bouton4");
bouton4.addEventListener("click", clickbtn4);

function clickbtn4(){

    var pu = window.prompt("Veuillez saisir le prix unitaire")
    var qtecom = window.prompt("Veuillez saisir la quantité commandé")

    var tot = (pu * qtecom);
    console.log(tot);

        if ((tot >=100) && (tot <=200)){
            var remise = 5;
            }

        else if (tot <100){
            var remise = 0;
        }

        else {
            var remise = 10;
        }

    console.log("le pourcentage de remise est de : " + remise + "%");
    var remise1 = tot * remise / 100;
    var totalremise = tot - remise1;

    console.log("la remise est égal à : " + remise1 + "€");
    console.log("le prix remisé est égal à : " + totalremise + "€");

    

        if ((totalremise >0) && (totalremise <500)){
            var fport = 2;
        }

        else if (totalremise >500){
            var fport = 0;
        }

        else {
            var fport = 2;
        }

        var fraisport = totalremise * fport / 100 

        if ((fraisport > 6) || (fraisport == 0)){ 
            var fportmin = 0;
            var fportmin2 = fraisport;
        }

        else if ((fraisport != 0) && (fraisport <= 6)){ 
            var fportmin = 6;
            var fportmin2 = 0;
        }


    var fraisport2 = fportmin + fportmin2;
    var fraisport3 = Math.round(fraisport2 * 100) / 100;
    var totalfraisport = totalremise + fraisport3;
    var totalfraisport2 = Math.round(totalfraisport * 100) / 100;
    


    console.log("Les frais de port sont de : " + fraisport3 + "€")
    console.log("Le total de la commande est de : " + totalfraisport2 + "€")
}