import React, { Component } from 'react';
import Mycars from './components/Mycars';
import './App.css';

class App extends React.Component {

  state = {
    titre: 'Mon catalogue Voitures',
    color: 'green'
  }

  changeTitle = (e) => {
    this.setState({
      titre: 'Mon nouveau titre'
    })
  }

  changeViaParam = (titre) => {
    this.setState({
      titre: titre
    })
  }

  changeViaBind = (param) => {
    this.setState({
      titre: param
    })
  }

  changeViaInput = (e) => {
    this.setState({
      titre: e.target.value
    })
  }

  render(){
    
    return (
    <div className="App">
      <Mycars title={this.state.titre} color={this.state.color}/>

      <button onClick={this.changeTitle}>Changer le nom</button>
      <button onClick={() => this.changeViaParam('Titre via parametre')}>Changer le nom avec parametre</button>
      <button onClick={this.changeViaBind.bind(this, 'Titre via bind')}>Changer le nom avec Bind</button>
      <input type="text" onChange={this.changeViaInput} value={this.state.titre}></input>
    </div>
  );
  }

  
}

export default App;
