import React, {useState} from 'react';

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

export default function TimeAkad() {
  const classes = useStyles();

  const [state] = useState({
    listJWA: ['7 Hari']
  });

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
            label="Jangka Waktu Akad"
            data={state.listJWA}
          />
        </div>
      </CardContent>
    </Card>
  );
}