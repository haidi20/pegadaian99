import React, { Component } from 'react';
import ReactDOM from 'react-dom';

//component 
import Header from './organisms/_layouts/Header';

export default class Main extends Component {
    constructor() {
        super()
        this.state = {
            name: 'mantab'
        }
    }

    render() {
        return (
            <div>
                coba
                <Header></Header>
            </div>
        );
    }
}

ReactDOM.render(<Main />, document.getElementById('app'));
