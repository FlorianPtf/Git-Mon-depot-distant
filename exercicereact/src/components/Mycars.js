import React, { Component } from 'react';
import Car from './Cars';
import MyHeader from './MyHeader';
import Wrapper from './Wrapper';
import Welcome from './Welcome';

class Mycars extends Component {

    state = {
        // cars: ["Ford", "Mercedes", "Peugeot"],
        voitures : [
            {name: 'Ford', color: 'Red', year: 2010},
            {name: 'Mercedes', color: 'Black', year: 2021},
            {name: 'Peugeot', color: 'Green', year: 2022},
        ]
    }
    
    noCopy = () => {
        alert('merci de ne pas copier');
    }

    addStyle = (e) => {

        if(e.target.classList.contains('styled')){
            e.target.classList.remove('styled');
        } else {
            e.target.classList.add('styled');
        }
    }

    addTenYears = () => {

        const updatedState = this.state.voitures.map((param) => {
            return param.year -= 10;
        })

        this.setState({
            updatedState
        })
    }

    getAge = (year) => {

        const now = new Date().getFullYear();
        const age = now - year;

        let frenchYearStr = "";
        if (age === 1 ){
            frenchYearStr = "an";
        } else if (age === 0) {
            frenchYearStr = "";
        } else {
            frenchYearStr = "ans";
        }

        return `${age} ${frenchYearStr}`;

    }


    render(){

        const [Ford, Mercedes, Peugeot] = this.state.voitures;


        // const year = new Date().getFullYear();

        const {color} = this.props;
        return(
        <div>
            <Wrapper>
                <MyHeader myStyle={this.props.color}>
                    {this.props.title}

                    {/* <h4 onMouseOver={this.addStyle}>{this.props.title}</h4>  ---- Ajout style CSS ----- */}

                </MyHeader>
                
                <p onCopy={this.noCopy}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, aspernatur!</p>

                <button onClick={ this.addTenYears}> +10 ans</button>

            </Wrapper>


            {/* <Car year={"2000"} color="red">{this.state.cars[0]}</Car>
            <Car color="blue">{this.state.cars[1]}</Car>
            <Car color="green">{this.state.cars[2]}</Car>    ---- Technique avec array ------ */}


            {/* <Car 
                nom = {Ford.name}
                color={Ford.color} 
                year={Ford.year + ' ans'}
            />

            <Car 
                nom = {Mercedes.name}
                color={Mercedes.color} 
                year={Mercedes.year + ' ans'}
            />

            <Car 
                nom = {Peugeot.name}
                color={Peugeot.color} 
                year={Peugeot.year + ' ans'}
            /> */}


            {
                this.state.voitures.map(({name, color, year}, index) => {
                    return(
                        <div key={index} >
                            <Car nom={name} color={color} year={this.getAge(year)}/>
                        </div>
                    )
                })
            }

            <Welcome /> <br></br>

        </div>
        )
    }
}

export default Mycars;