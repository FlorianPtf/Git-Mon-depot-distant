function calcul(){
    let taille = document.getElementById("taille").value / 100;
    let poids = document.getElementById("poids").value;

    let imc = poids / (taille * taille);
    let imcFinal = imc.toFixed(2);


    if (taille == 0) {
        document.getElementById("taille").placeholder = "Veuillez renseigner votre taille";
    }

    else if (poids == 0) {
        document.getElementById("poids").placeholder = "Veuillez renseigner votre poids"
    }

    else {
        document.getElementById("imc").innerHTML = "Votre IMC est de " + imcFinal;

        document.getElementById("taille").placeholder = "kg"
        document.getElementById("poids").placeholder = "cm"

        if (imcFinal < 18.5) {
        document.getElementById("imc").style.color = "#94bbe9";
        frise = document.querySelector(".frise1");
        friseInactive = document.querySelectorAll(".frise2, .frise3, .frise4, .frise5");
        for (var i = 0; i < friseInactive.length; i++){
            friseInactive[i].setAttribute("id", "friseInactive");
        }
        frise.setAttribute("id", "friseAnimated");
        document.getElementById("imctext").innerHTML = `D'après l"échelle de l'OMS un IMC inférieur à 18,5 équivaut à une dénutrition. 
        Mais tout dépend d’où on se situe par rapport à cette valeur. En effet, de nombreuses personnes minces ont un IMC proche de 18,5 
        avec une alimentation équilibrée : dans ces cas, il n’y a donc pas de conséquences néfastes pour leur santé. Néanmoins, un IMC très 
        faible peut être un indice pour repérer une situation de dénutrition, dangereuse.`;
    }

    else if (imcFinal >= 18.5 && imcFinal <= 25){
        document.getElementById("imc").style.color = "#abe994";
        frise = document.querySelector(".frise2");
        friseInactive = document.querySelectorAll(".frise1, .frise3, .frise4, .frise5");
        for (var i = 0; i < friseInactive.length; i++){
            friseInactive[i].setAttribute("id", "friseInactive");
        }
        frise.setAttribute("id", "friseAnimated");
        document.getElementById("imctext").innerHTML = `D'après l"échelle de l'OMS vous n'êtes ni en surpoids, ni en maigreur. Une alimentation équilibrée, 
        un mode de vie sain et l'exercice contribuent à une bonne santé physique et psychique.`;
    }

    else if (imcFinal >= 25 && imcFinal <= 30){
        document.getElementById("imc").style.color = "#e9a535";
        frise = document.querySelector(".frise3");
        friseInactive = document.querySelectorAll(".frise1, .frise2, .frise4, .frise5");
        for (var i = 0; i < friseInactive.length; i++){
            friseInactive[i].setAttribute("id", "friseInactive");
        }
        frise.setAttribute("id", "friseAnimated");
        document.getElementById("imctext").innerHTML = `D'après l"échelle de l'OMS le surpoids est un facteur de risque bien connu 
        pour nombre de maladies cardiovasculaires (diabète, hypertension, insuffisance cardiaque, athérosclérose, etc.). C’est pourquoi 
        il convient de le réduire le plus possible avec un régime alimentaire adapté.`;
    }

    else if (imcFinal >= 30 && imcFinal <= 40){
        document.getElementById("imc").style.color = "#f57c20";
        frise = document.querySelector(".frise4");
        friseInactive = document.querySelectorAll(".frise1, .frise2, .frise3, .frise5");
        for (var i = 0; i < friseInactive.length; i++){
            friseInactive[i].setAttribute("id", "friseInactive");
        }
        frise.setAttribute("id", "friseAnimated");
        document.getElementById("imctext").innerHTML = `D'après l"échelle de l'OMS, plus encore que le surpoids, l’obésité est un facteur de risque important pour 
        de nombreuses maladies cardiovasculaires et réduit considérablement la qualité de vie et la longévité.`;
    }

    else if (imcFinal > 40){
        document.getElementById("imc").style.color = "#f52020";
        frise = document.querySelector(".frise5");
        friseInactive = document.querySelectorAll(".frise1, .frise2, .frise3, .frise4");
        for (var i = 0; i < friseInactive.length; i++){
            friseInactive[i].setAttribute("id", "friseInactive");
        }
        frise.setAttribute("id", "friseAnimated");
        document.getElementById("imctext").innerHTML = `D'après l"échelle de l'OMS, plus encore que le surpoids, l’obésité est un facteur de risque important pour 
        de nombreuses maladies cardiovasculaires et réduit considérablement la qualité de vie et la longévité.
        En cas d’IMC très élevé (IMC supérieur à 40) et/ou en seconde intention, lorsque les risques de comorbidité sont élevés, 
        une intervention de chirurgie bariatrique peut être envisagée.`;
    }
    }   
}