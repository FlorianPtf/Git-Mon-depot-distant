const Welcome = () => {

    const bonjour = () => console.log("Bonjour");

    const bonsoir = arg => console.log(arg);
    

    return(
        <div>

            <button onClick={bonjour}>Invoquer une fonction </button>

            <button onClick={() => bonsoir("Bonsoir")}>Invoquer une fonction avec arg "Bonsoir"</button>

            <button onClick={() => console.log("Bonne nuit")}>Clg sur le bouton </button>

        </div>
    )
}

export default Welcome