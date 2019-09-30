import React, {Component} from 'react';
import { Route, Link } from "react-router-dom";

import Avatar from '../../../../public/avenger/assets/demo/avatar/administrator.png';

const ListItemLink = ({ to, activeOnlyWhenExact, children }) => {
    return (
      <Route
        path={to}
        exact={activeOnlyWhenExact}
        children={({ match }) => (
          <li className={match ? 'active' : ''}>
            <Link to={Array.isArray(to) ? to[0] : to}>{children}</Link>
          </li>
        )}
      />
    );
};

class SideBar extends Component{
    constructor(){
        super();

        this.state = {
            menus: [
                {name: 'Menu', icon: 'fa fa-home', link: ['/', '/media*'], active: 'menu'},
                {name: 'Post', icon: 'fa fa-pinterest', link: '/post', active: 'post'},
            ],
            active: 'post'
        }
    }

    componentDidMount(){

    }

    render(){
        const {menus} = this.state;
        return(
            <div className="static-sidebar-wrapper sidebar-inverse">
                <div className="static-sidebar">
                    <div className="sidebar">
                        <div className="widget stay-on-collapse" id="widget-welcomebox">
                            <div className="widget-body welcome-box tabular">
                                <div className="tabular-row">
                                    <div className="tabular-cell welcome-avatar">
                                        <a href="#">
                                            <img src={Avatar} className="avatar" />
                                        </a>
                                    </div>
                                    <div className="tabular-cell welcome-options">
                                        <span className="welcome-text">Welcome,</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="widget stay-on-collapse" id="widget-sidebar">
                            <nav role="navigation" className="widget-body">
                                <ul className="acc-menu">
                                    <li className="nav-separator">Explore</li>
                                    {
                                        menus.map((item, index) => {
                                            return(
                                                <ListItemLink activeOnlyWhenExact={true} to={item.link} key={index}>
                                                    <i className={item.icon} key={index}></i>
                                                    <span>{item.name}</span>
                                                </ListItemLink>
                                            )
                                        })
                                    }
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default SideBar;