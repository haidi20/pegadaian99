import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route } from "react-router-dom";

//redux
import {createStore} from 'redux';
import { Provider } from 'react-redux';
import rootReducer from '../redux/reducer/globalReducer';

//component 
import Header from './_layouts/Header';
import SideBar from './_layouts/SideBar';

//page :
//menu
import Menu from './pages/media';
import MenuForm from './pages/media/Form';
//post
import Post from './pages/post';



const storeRedux = createStore(rootReducer);

export default class Main extends Component {
    render() {
        return (
            <div>
                <Provider store={storeRedux}>
                    <Router>
                        <Header />
                        <div id="wrapper">
                            <div id="layout-static">
                                <SideBar />

                                <div className="static-content-wrapper">
                                    {/* <Menu/> */}
                                    <Route path="/" exact component={Menu} />
                                    <Route path="/media/create" exact component={MenuForm} />
                                    <Route path="/media/edit/:id" exact component={MenuForm} />
                                    <Route path="/post" exact component={Post} />
                                </div>
                            </div>
                        </div>
                    </Router>
                </Provider>
            </div>
        );
    }
}

ReactDOM.render(<Main />, document.getElementById('app'));
