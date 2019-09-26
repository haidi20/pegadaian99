import React, {Fragment} from 'react';
import { makeStyles } from '@material-ui/core/styles';

// component
import Card from '@material-ui/core/Card';
import CardHeader from '@material-ui/core/CardHeader';
import CardContent from '@material-ui/core/CardContent';

export default function InsuranceItem() {
    const classes = useStyles();
    return (
        <Fragment>
            <Card className={classes.card}>
                <CardContent>
                <CardHeader
                    title="Keterangan Marhun Barang Jaminan"
                    titleTypographyProps={{variant:'subtitle1' }}
                />
                <hr/>
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