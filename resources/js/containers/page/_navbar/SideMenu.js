import React from 'react';

import AddIcon from '@material-ui/icons/Add';
import ListItem from '@material-ui/core/ListItem';
import ListItemIcon from '@material-ui/core/ListItemIcon';
import ListItemText from '@material-ui/core/ListItemText';

export default function SideMenu() {

  return (
    <div>
      {['Akad Baru'].map((text, index) => (
        <ListItem button key={text}>
          <ListItemIcon>
            <AddIcon/>
          </ListItemIcon>
          <ListItemText primary={text} />
        </ListItem>
      ))}
    </div>
  );
}