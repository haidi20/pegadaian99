import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import InputLabel from '@material-ui/core/InputLabel';
import FormHelperText from '@material-ui/core/FormHelperText';
import FormControl from '@material-ui/core/FormControl';
import Select from '@material-ui/core/Select';
import NativeSelect from '@material-ui/core/NativeSelect';

const useStyles = makeStyles(theme => ({
  root: {
    display: 'flex',
    flexWrap: 'wrap',
  },
  formControl: {
    margin: theme.spacing(1),
    minWidth: 170,
  },
  selectEmpty: {
    marginTop: theme.spacing(2),
  },
}));

export default function NativeSelects(props) {
  const classes = useStyles();
  const {data} = props;
  const [state, setState] = React.useState({
    age: '',
    name: 'hai',
  });
  const inputLabel = React.useRef(null);
  const [labelWidth, setLabelWidth] = React.useState(0);

  React.useEffect(() => {
    setLabelWidth(inputLabel.current.offsetWidth);
  }, []);

  const handleChange = name => event => {
    setState({
      ...state,
      [name]: event.target.value,
    });
  };

  console.log(props)

  return (
    <div className={classes.root}>
      <FormControl className={classes.formControl}>
        <InputLabel ref={inputLabel} htmlFor="outlined-age-native-simple">
          {props.label}
        </InputLabel>
        <NativeSelect
          defaultValue={30}
          inputProps={{
            name: 'name',
            id: 'uncontrolled-native',
          }}
          style={{height: 45}}
        >
          <option value="" />
          {
            data.map((item, index) => {
              return(
                <option>{item}</option>
              )
            })
          }
          {/* <option value={10}>Ten</option>
          <option value={20}>Twenty</option>
          <option value={30}>Thirty</option> */}
        </NativeSelect>
        {/* <FormHelperText>Uncontrolled</FormHelperText> */}
      </FormControl>
      {/* <FormControl variant="outlined" className={classes.formControl}>
        <InputLabel ref={inputLabel} htmlFor="outlined-age-native-simple">
          Age
        </InputLabel>
        <Select
          native
          value={state.age}
          onChange={handleChange('age')}
          labelWidth={labelWidth}
          inputProps={{
            name: 'age',
            id: 'outlined-age-native-simple',
          }}
          style={{height:65}}
        >
          <option value="" />
          <option value={10}>Ten</option>
          <option value={20}>Twenty</option>
          <option value={30}>Thirty</option>
        </Select>
      </FormControl> */}
    </div>
  );
}