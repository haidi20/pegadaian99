import React, {Component} from 'react';

import Avatar from '../../../../../public/avenger/assets/demo/avatar/administrator.png';

class SideBar extends Component{
    render(){
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
                                    <li className="active">
                                        <a href="#">
                                            <i className="fa fa-home"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
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