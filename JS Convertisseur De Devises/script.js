import chargerDonnees from "./chargement.js"

const chargerPage = async() => {
const devises = await chargerDonnees(); 

const listeDevises = Object.keys(devises);

const fragment = document.createDocumentFragment();

for (const devise of listeDevises) {
    const taux = devises[devise].toFixed(5);

    const divElement = document.createElement('div');
    divElement.innerHTML =  `
    <div class="cardsection">
        <input type="number" id="eur-${devise}" step="0.00001" value="1">
        <span>EUR</span>
        <span> <=> </span>
        <input type="number" id="${devise}-eur" step="0.00001" value="${taux}">
        <span>${devise.toUpperCase()}</span>
    </div>`

    fragment.appendChild(divElement);
}

const container = document.getElementById('containerDevise');
container.appendChild(fragment);

const OnChange = e => {

    const input = e.target;
    const identifiant = input.id;

    const valeurTexte = input.value;

    const valeurNombre = parseFloat(valeurTexte);

    const devisesParties = identifiant.split('-');

    const deviseSource = devisesParties[0];

    const deviseDestination = devisesParties[1];

    let taux;
    let nouvelleConversion;

    if (deviseSource === 'eur'){
        const taux = devises[deviseDestination];
        nouvelleConversion = valeurNombre * taux;
    }   
    else {
        const taux = devises[deviseSource];
        nouvelleConversion = valeurNombre / taux;
    }

    const nouvelleConversionTexte = nouvelleConversion.toFixed(5);

    const devisesPartiesInversees = devisesParties.reverse();

    const identifiantDestination = devisesPartiesInversees.join('-');

    const champDestination = document.getElementById(identifiantDestination);
    champDestination.value = nouvelleConversionTexte;
}

const champs = document.querySelectorAll('input');

for (const champ of champs){
    champ.addEventListener('input', OnChange)
}
}

chargerPage();