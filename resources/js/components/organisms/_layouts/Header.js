import React, {Component} from 'react';

class Header extends Component{
    render(){
        return(
            <header id="topnav" className="navbar navbar-inverse navbar-fixed-top clearfix" role="banner">
                <span id="trigger-sidebar" className="toolbar-trigger toolbar-icon-bg">
                    <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                        <span className="icon-bg"><i className="fa fa-fw fa-bars"></i></span>
                    </a>
                </span>
                <a className="navbar-brand" href="#">kreasibeton</a>
                <span id="trigger-infobar" className="toolbar-trigger toolbar-icon-bg">
                    <a data-toggle="tooltips" data-placement="left" title="Toggle Infobar"></a>
                </span>
                <ul className="nav navbar-nav toolbar pull-right" data-auto-collapse="false">
                    <li className="dropdown toolbar-icon-bg">
                        <a href="#" className="dropdown-toggle" data-toggle='dropdown'><span className="icon-bg"><i className="fa fa-fw fa-user"></i></span></a>
                        <ul className="dropdown-menu userinfo arrow" data-auto-collapse="false">
                            <li><a href="#"><span className="pull-left">Sign Out</span> <i className="pull-right fa fa-sign-out"></i></a></li>
                        </ul>
                    </li>
                </ul>
            </header>
        )
    }
}

export default Header;