import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Route extends Component {
    constructor() {
        super()
        this.state = {
            name: 'mantab'
        }
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">{this.state.name}</div>

                            <div className="card-body">I'm an example component!</div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(<Route />, document.getElementById('home'));
