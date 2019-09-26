import React from 'react';

import Input from '../atoms/Input';
import DropDown from '../atoms/Dropdown';

// component
import Card from '@material-ui/core/Card';
import { makeStyles } from '@material-ui/core/styles';
import CardContent from '@material-ui/core/CardContent';

const useStyles = makeStyles(theme => ({
  card: {
    minWidth: 275,
  },
  root: {
    display: 'flex',
    flexWrap: 'wrap',
  },
}));

export default function SimpleCard() {
  const classes = useStyles();

  return (
    <Card className={classes.card}>
      <CardContent>
        <div className={classes.root}>
          <Input 
            label="No ID" 
            value="no id"
            disabled={true}
          />
          <DropDown

          />
        </div>
      </CardContent>
    </Card>
  );
}