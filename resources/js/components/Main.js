import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route } from "react-router-dom";

//component 
import Header from './organisms/_layouts/Header';
import SideBar from './organisms/_layouts/SideBar';

//page
import Menu from './pages/menu';
import Post from './pages/post';

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
            <Router>
                <Header />
                <div id="wrapper">
                    <div id="layout-static">
                        <SideBar />

                        <div className="static-content-wrapper">
                            {/* <Menu/> */}
                            <Route path="/" exact component={Menu} />
                            <Route path="/post" exact component={Post} />
                        </div>
                    </div>
                </div>
            </Router>
            </div>
        );
    }
}

ReactDOM.render(<Main />, document.getElementById('app'));
