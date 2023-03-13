const donnees = `
<gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
<gesmes:subject>Reference rates</gesmes:subject>
<gesmes:Sender>
<gesmes:name>European Central Bank</gesmes:name>
</gesmes:Sender>
<Cube>
<Cube time="2023-03-07">
<Cube currency="USD" rate="1.0665"/>
<Cube currency="JPY" rate="145.21"/>
<Cube currency="BGN" rate="1.9558"/>
<Cube currency="CZK" rate="23.495"/>
<Cube currency="DKK" rate="7.4426"/>
<Cube currency="GBP" rate="0.88968"/>
<Cube currency="HUF" rate="377.38"/>
<Cube currency="PLN" rate="4.6898"/>
<Cube currency="RON" rate="4.9178"/>
<Cube currency="SEK" rate="11.2285"/>
<Cube currency="CHF" rate="0.9959"/>
<Cube currency="ISK" rate="149.90"/>
<Cube currency="NOK" rate="11.1935"/>
<Cube currency="TRY" rate="20.1736"/>
<Cube currency="AUD" rate="1.6002"/>
<Cube currency="BRL" rate="5.5224"/>
<Cube currency="CAD" rate="1.4552"/>
<Cube currency="CNY" rate="7.3975"/>
<Cube currency="HKD" rate="8.3719"/>
<Cube currency="IDR" rate="16403.79"/>
<Cube currency="ILS" rate="3.8504"/>
<Cube currency="INR" rate="87.2625"/>
<Cube currency="KRW" rate="1392.09"/>
<Cube currency="MXN" rate="19.2065"/>
<Cube currency="MYR" rate="4.7699"/>
<Cube currency="NZD" rate="1.7229"/>
<Cube currency="PHP" rate="58.721"/>
<Cube currency="SGD" rate="1.4357"/>
<Cube currency="THB" rate="36.917"/>
<Cube currency="ZAR" rate="19.5975"/>
</Cube>
</Cube>
</gesmes:Envelope>
`

export default () => {

    const devises = {}


    const BALISE_CUBE = "<Cube>";
    const BALISE_CUBE_FIN = "</Cube>"
    const TAILLE_BALISE_FIN_CUBE = BALISE_CUBE_FIN.length

    const positionCubeEntree = donnees.indexOf(BALISE_CUBE);
    const positionCubeFin = donnees.lastIndexOf(BALISE_CUBE_FIN);

    const donneesXML = donnees.substring(positionCubeEntree, positionCubeFin + TAILLE_BALISE_FIN_CUBE);

    const parser = new DOMParser()

    const mimeTypeXML = 'text/xml';

    const documentXML = parser.parseFromString(donneesXML, mimeTypeXML);

    const cube1 = documentXML.firstElementChild;

    const cube2 = cube1.firstElementChild;

    const cubeAttributs = cube2.attributes;

    const attrTime = cubeAttributs.getNamedItem("time");

    const time = attrTime.value;

    console.log(documentXML);
    console.log(time);

    const timeElement = document.getElementById("time");
    timeElement.textContent = `Date des cours:  ${time}`;

    const elements = cube2.children;
    for (const element of elements){
        const attributs = element.attributes;
        const currencyText = attributs.getNamedItem("currency").value;
        const rateText = attributs.getNamedItem("rate").value;

        const monnaie = currencyText.toLocaleLowerCase();
        const taux = parseFloat(rateText);
        
        devises[monnaie] = taux;
    }

    return devises;
}