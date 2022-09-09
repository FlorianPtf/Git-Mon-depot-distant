import React, { Component } from 'react';
import Wrapper from './Wrapper';

const Car = ({nom, color, year}) => {

    const colorInfo = color ? (<p>Couleur: { color }</p>) : (<p>Couleur: Néant</p>);

    if(nom) {
        return (
            <Wrapper>
                <p>Marque: { nom }</p>
                <p>Année: { year }</p>

                { colorInfo}
            </Wrapper>
        )
    } else {
        return (
            <Wrapper>
                <p>Pas de data</p>
            </Wrapper>
        )
    }

}

export default Car;