import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from "react-router-dom";

// components
import Navbar from './pages/_navbar';

export default class Main extends Component {
    constructor() {
        super()
        this.state = {
            name: 'mantab'
        }
    }

    render() {
        return (
            <Router>
                <div>
                    <Navbar/>    
                </div>     
            </Router>
        );
    }
}

ReactDOM.render(<Main />, document.getElementById('home'));
