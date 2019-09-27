import React, {Fragment} from 'react';

//component
import Input from '../../atoms/Input';

// material
import Grid from '@material-ui/core/Grid';
import Card from '@material-ui/core/Card';
import CardHeader from '@material-ui/core/CardHeader';
import { makeStyles } from '@material-ui/core/styles';
import CardContent from '@material-ui/core/CardContent';


export default function InsuranceItem() {
    const classes = useStyles();
    return (
        <Fragment>
            <Card className={classes.card}>
                <CardHeader
                    title="Keterangan Marhun Barang Jaminan"
                    titleTypographyProps={{variant:'subtitle1' }}
                />
                <CardContent>
                    <div className={classes.root}>
                        <Grid container spacing={0}>
                            <Grid item md={12}>
                                <Input
                                    label="Nama Barang"
                                    fullWidth={true}
                                />
                            </Grid>
                            <Grid item md={10}>
                                <Input
                                    label="Type"
                                    fullWidth={true}
                                />
                            </Grid>
                        </Grid>
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