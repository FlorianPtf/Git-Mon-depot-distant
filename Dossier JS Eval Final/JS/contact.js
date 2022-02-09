// ****************************************************************************
// ********************* Selection du bouton submit ***************************
// ****************************************************************************


var bouton5 = document.getElementById("submit");
bouton5.addEventListener("click", clickbtnnom);


// ****************************************************************************
// ********************* Fonction débute lors du "submit" *********************
// ****************************************************************************


function clickbtnnom(event){
    

// ****************************************************************************
// ************************* Variable du Nom **********************************
// ****************************************************************************


    var nomRgex = /^[A-Za-z]+$/;
    var nomjs = document.getElementById("Nom");
    var nommanquantjs = document.getElementById("NomManquant");
    var nomincorrectjs = document.getElementById("NomIncorrect");


// ****************************************************************************
// ************************* Variable du Prenom *******************************
// ****************************************************************************


    var prenomRgex = /^[A-Za-z]+$/;
    var prenomjs = document.getElementById("prenom");
    var prenommanquantjs = document.getElementById("PrenomManquant");
    var prenomincorrectjs = document.getElementById("PrenomIncorrect");



// ****************************************************************************
// ************************* Variable du Sexe *********************************
// ****************************************************************************


    var sexejs2 = document.querySelectorAll('input[name="Sexes"]:checked');
    

// ****************************************************************************
// ************************* Variable de la date ******************************
// ****************************************************************************


    var ddnRgex = /^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/;
    var ddnjs = document.getElementById("DDN");
    var ddnmanquantjs = document.getElementById("DDNManquant");    
    var ddnincorrectjs = document.getElementById("DDNIncorrect");




// ****************************************************************************
// ************************* Variable du Code Postal **************************
// ****************************************************************************


    var cpRgex = /[0-9]{5}/;
    var cpjs = document.getElementById("CP");
    var cpmanquantjs = document.getElementById("CPManquant");
    var cpincorrectjs = document.getElementById("CPIncorrect");



// ****************************************************************************
// ************************* Variable de l'adresse ****************************
// ****************************************************************************


    var adressejs = document.getElementById("Adresse").value;
    var villejs = document.getElementById("Ville").value;


// ****************************************************************************
// ************************* Variable de l'email ******************************
// ****************************************************************************


    var emailRgex = /^[A-Za-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/;
    var emailjs = document.getElementById("Mail");
    var emailmanquantjs = document.getElementById("MailManquant");
    var emailincorrectjs = document.getElementById("MailIncorrect");

    

// ****************************************************************************
// *********************** Variable de la question ****************************
// ****************************************************************************


    var questionRgex = /[A-Za-z0-9.-]{2,}/
    var questionjs = document.getElementById("Question").value;
    var questionmanquantjs = document.getElementById("QuestionManquant").value;



// ****************************************************************************
// *********************** Fonction Validation Nom ****************************
// ****************************************************************************

        if (nomjs.validity.valueMissing) {
            nommanquantjs.textContent = "Veuillez saisir votre nom";
            nommanquantjs.style.color = "red";
            event.preventDefault();
        }     
       
        else if (nomRgex.test(nomjs.value) == false ){
            document.getElementById("NomIncorrect").textContent = "Champ incorrect";
            document.getElementById("NomIncorrect").style.color = "red";
            document.getElementById("NomManquant").hidden = true;
            event.preventDefault();
        }   

        else { 
            console.log("Nom : " + nomjs.value);
            document.getElementById("NomManquant").hidden = true;
            document.getElementById("NomIncorrect").hidden = true;

        }
    
    
// ****************************************************************************
// *********************** Fonction Validation Prenom *************************
// ****************************************************************************

        
        if (prenomjs.validity.valueMissing) {
            prenommanquantjs.textContent = "Veuillez saisir votre prénom";
            prenommanquantjs.style.color = "red";
            event.preventDefault();
        }

        else if (prenomRgex.test(prenomjs.value) == false ) {
            document.getElementById("PrenomIncorrect").textContent = "Champ incorrect";
            document.getElementById("PrenomIncorrect").style.color = "red";
            document.getElementById("PrenomManquant").hidden = true;
            event.preventDefault();
        }

        else {
                console.log("Prénom : " + prenomjs.value);
                document.getElementById("PrenomManquant").hidden = true;
                document.getElementById("PrenomIncorrect").hidden = true;
        }   


// ****************************************************************************
// *********************** Fonction Validation Sexe ***************************
// ****************************************************************************


        if (document.getElementById('Sexe1').checked) {
            console.log("Le sexe est Féminin");
            document.getElementById("SexeManquant").hidden = true;}

        else if (document.getElementById('Sexe2').checked) {
            console.log("Le sexe est Masculin");
            document.getElementById("SexeManquant").hidden = true;}

        else if (document.getElementById('Sexe3').checked) {
            console.log("Le sexe est : Neutre");
            document.getElementById("SexeManquant").hidden = true;}

        else {
            document.getElementById("SexeManquant").textContent = "Champ incorrect";
            document.getElementById("SexeManquant").style.color = "red";
            event.preventDefault();
        }


// ****************************************************************************
// ****************** Fonction Validation Date Naissance **********************
// ****************************************************************************



        if (ddnjs.validity.valueMissing) {
            ddnmanquantjs.textContent = "Veuillez saisir votre date de naissance";
            ddnmanquantjs.style.color = "red";
            event.preventDefault();
        }

        else {
                console.log("Date de naissance : " + ddnjs.value);
                document.getElementById("DDNManquant").hidden = true;
                document.getElementById("DDNIncorrect").hidden = true;
        }  

// ****************************************************************************
// ******************** Fonction Validation Code Postal ***********************
// ****************************************************************************

        if (cpjs.validity.valueMissing) {
            cpmanquantjs.textContent = "Veuillez saisir votre code postal";
            cpmanquantjs.style.color = "red";
            event.preventDefault();
        }

        else if (cpRgex.test(cpjs.value) == false ) {
            document.getElementById("CPIncorrect").textContent = "Champ incorrect";
            document.getElementById("CPIncorrect").style.color = "red";
            document.getElementById("CPManquant").hidden = true;
            event.preventDefault();
        }

        else {
                console.log("Code postal : " + cpjs.value);
                document.getElementById("CPManquant").hidden = true;
                document.getElementById("CPIncorrect").hidden = true;
        }  


            console.log("Adresse : " + adressejs);
            console.log("Ville : " + villejs);

// ****************************************************************************
// *********************** Fonction Validation Mail ***************************
// ****************************************************************************

        if (emailjs.validity.valueMissing) {
            emailmanquantjs.textContent = "Veuillez saisir votre email";
            emailmanquantjs.style.color = "red";
            event.preventDefault();
        }

        else if (emailRgex.test(emailjs.value) == false ) {
            document.getElementById("MailIncorrect").textContent = "Champ incorrect";
            document.getElementById("MailIncorrect").style.color = "red";
            document.getElementById("MailManquant").hidden = true;
            event.preventDefault();
        }

        else {
                console.log("Email : " + emailjs.value);
                document.getElementById("MailManquant").hidden = true;
                document.getElementById("MailIncorrect").hidden = true;
        }  

// ****************************************************************************
// ********************* Fonction Validation Question *************************
// ****************************************************************************

        if (questionRgex.test(questionjs)) {
            console.log("Question posé : " + questionjs);
            document.getElementById("QuestionManquant").hidden = true;
        }
        else {
            document.getElementById("QuestionManquant").textContent = "Veuillez saisir votre question";
            document.getElementById("QuestionManquant").style.color = "red";
            event.preventDefault();
        }

        return true;
    }
