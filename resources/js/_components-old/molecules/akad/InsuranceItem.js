import React, {Fragment, Component} from 'react';

//component
import Input from '../../atoms/Input';

// material
import Grid from '@material-ui/core/Grid';
import Card from '@material-ui/core/Card';
import CardHeader from '@material-ui/core/CardHeader';
import { makeStyles } from '@material-ui/core/styles';
import CardContent from '@material-ui/core/CardContent';

// material radio
import Radio from '@material-ui/core/Radio';
import RadioGroup from '@material-ui/core/RadioGroup';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import FormControl from '@material-ui/core/FormControl';
import FormLabel from '@material-ui/core/FormLabel';

class InsuranceItem extends Component{
    constructor(){
        super();
    }

    render(){
        const useStyles = {
            card: {
                minWidth: 275,
            },
            root: {
                display: 'flex',
                flexWrap: 'wrap',
            },
        }
        
        const {root} = useStyles;

        //kebutuhan element radio
        const [value, setValue] = React.useState('elektronik');

        const handleChange = event => {
            setValue(event.target.value);   
        };
        return (
            <Fragment>
                <h3>coba</h3>
            </Fragment>
        );
    }
}

export default InsuranceItem;

// export default function InsuranceItem() {
//     const classes = useStyles();

//     //kebutuhan element radio
//     const [value, setValue] = React.useState('elektronik');

//     const handleChange = event => {
//         setValue(event.target.value);
//     };

    // return (
    //     <Fragment>
    //         <Card className={classes.card}>
    //             <CardHeader
    //                 title="Keterangan Marhun Barang Jaminan"
    //                 titleTypographyProps={{variant:'subtitle1' }}
    //             />
    //             <CardContent>
    //                 <div className={classes.root}>
    //                     <Grid container spacing={0}>
    //                         <Grid item md={12}>
    //                             <Input
    //                                 label="Nama Barang"
    //                                 fullWidth={true}
    //                             />
    //                         </Grid>
    //                         <Grid item md={12}>
    //                             <FormControl component="fieldset">
    //                                 <FormLabel component="legend">Jenis Barang</FormLabel>
    //                                 <RadioGroup aria-label="position" name="position" value={value} onChange={handleChange} row>
    //                                     <FormControlLabel
    //                                         value="elektronik"
    //                                         control={<Radio color="primary" />}
    //                                         label="Elektronik"
    //                                         labelPlacement="end"
    //                                     />
    //                                     <FormControlLabel
    //                                         value="kendaraan"
    //                                         control={<Radio color="primary" />}
    //                                         label="Kendaraan"
    //                                         labelPlacement="end"
    //                                     />
    //                                 </RadioGroup>
    //                             </FormControl>
    //                         </Grid>
    //                         <Grid item md={12}>
    //                             {/* <FormControl component="fieldset">
    //                                 <FormLabel component="legend">Jenis Barang</FormLabel>
    //                                 <RadioGroup aria-label="position" name="position" value={state.typeItem} onChange={handleChange} row>
    //                                     <FormControlLabel
    //                                         value="elektronik"
    //                                         control={<Radio color="primary" />}
    //                                         label="Elektronik"
    //                                     />
    //                                     <FormControlLabel
    //                                         value="kendaraan"
    //                                         control={<Radio color="primary" />}
    //                                         label="Kendaraan"
    //                                     />
    //                                 </RadioGroup>
    //                             </FormControl> */}
    //                         </Grid>
    //                     </Grid>
    //                 </div>
    //             </CardContent>
    //         </Card>
    //     </Fragment>
    // );
// }

// const useStyles = makeStyles(theme => ({
//     card: {
//       minWidth: 275,
//     },
//     root: {
//       display: 'flex',
//       flexWrap: 'wrap',
//     },
// }));