import React, {Component} from 'react';
import { Link } from "react-router-dom";

// material component
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';

// material icon
import AddIcon from '@material-ui/icons/Add';
import AccountBalanceIcon from '@material-ui/icons/AccountBalance';

export default class SideMenu extends Component {
  constructor(){
    super();
    this.state = {
      menus: [
        {
          link: '/akad',
          title: 'Akad Baru',
          icon: <AddIcon/>
        },
        {
          link: '/',
          title: 'Data Cabang',
          icon: <AccountBalanceIcon/>
        }
      ]
    }
  }
  render(){
    return (
      <div>
        {this.state.menus.map((item, index) => (
          <Link to={item.link} key={index}>
            <ListItem button key={index} >
              <ListItemIcon>
                {item.icon}
              </ListItemIcon>
              <ListItemText primary={item.title} />
            </ListItem>
          </Link>
        ))}
      </div>
    );
  }
}