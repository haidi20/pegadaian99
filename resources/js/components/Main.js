import React, { Component } from 'react';
import ReactDOM from 'react-dom';

//component 
import Header from './organisms/_layouts/Header';
import SideBar from './organisms/_layouts/SideBar';

//page
import Menu from './pages/menu';

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
                <Header />
                <div id="wrapper">
                    <div id="layout-static">
                        <SideBar />

                        <div className="static-content-wrapper">
                            <Menu/>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

ReactDOM.render(<Main />, document.getElementById('app'));
