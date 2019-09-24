import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

// components
import Akad from './page/akad';
import Layout from './page/_layouts';

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
                    <Layout/>

                    {/* <Route path="/" exact component={Akad} /> */}
                </div>
            </Router>
        );
    }
}

ReactDOM.render(<Main />, document.getElementById('home'));
