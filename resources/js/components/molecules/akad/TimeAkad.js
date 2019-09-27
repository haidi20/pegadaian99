import React, {useState, Fragment} from 'react';
import moment from 'moment';

import Input from '../../atoms/Input';
import DropDown from '../../atoms/Dropdown';

// component
import Card from '@material-ui/core/Card';
import { makeStyles } from '@material-ui/core/styles';
import CardContent from '@material-ui/core/CardContent';

export default function TimeAkad() {
  const classes = useStyles();
  const contractDate = moment().format('DD-MM-YY');

  const [state] = useState({
    periodOfTimes: [
      {
        value: 7,
        text: '7 Hari', 
      },
      {
        value: 15,
        text: '15 Hari', 
      },
      {
        value: 30,
        text: '30 Hari', 
      },
    ]
  });

  return (
    <Fragment>
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
              data={state.periodOfTimes}
            />
            <Input 
              label="Tanggal Akad" 
              value={contractDate}
              disabled={true}
            />
            <Input 
              label="Tanggal Jatuh Tempo" 
              value=""
              disabled={true}
            />
          </div>
        </CardContent>
      </Card>
    </Fragment>
  );
}

const useStyles = makeStyles(theme => ({
  card: {
    minWidth: 275,
  },
  root: {
    display: 'flex',
    flexWrap: 'wrap',
  },
}));