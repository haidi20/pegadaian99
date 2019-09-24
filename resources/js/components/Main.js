import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";

// components
import Akad from './containers/akad';

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
                    <nav>
                        <ul>
                            <li to="/">
                                Akad
                            </li>
                        </ul>
                    </nav>

                    <Route path="/" component={Akad} />
                </div>
            </Router>
        );
    }
}

ReactDOM.render(<Main />, document.getElementById('home'));
