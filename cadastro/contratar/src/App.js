import React from 'react';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import { createMuiTheme, withStyles, makeStyles, ThemeProvider } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import { green, purple } from '@material-ui/core/colors';
import './App.css';
import Cadastro from './cadastro';


const useStyles = makeStyles((theme) => ({
  root: {
    '& > *': {
      margin: theme.spacing(1),
    },
  },
}));

function App() {
  const classes = useStyles();

  return (
    <div className="App">
      <header className="App-header">
      <img
        src="https://gzsistemas.com.br/downloads/Icone-GZ.png"
        alt="img"
        className="imageCover"
      />
        <h2>Olá!<br />Vamos começar.</h2>
        <h3>Qual solução GZ se adequa ao seu negócio?</h3>
      
      <div className={classes.root}>
        <Button variant="contained" color="primary" className={classes.root} href="https://wa.me/5511941513237?text=Olá,%20tenho%20interesse%20em%20contratar">Monoloja. Falar com especialista</Button>
        <Router>
        <Link to="/cadastro/"><Button variant="contained" className={classes.root}>Multiloja</Button></Link>
        <Route path="/cadastro/" component={Cadastro} />
        </Router>

      </div>
      </header>
     
    </div>
    
  );
}

export default App;
