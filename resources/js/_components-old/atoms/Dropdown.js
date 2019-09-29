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
  const {data, label} = props;
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

  return (
    <FormControl variant="outlined" className={classes.formControl}>
      <InputLabel style={{fontSize: 13}} ref={inputLabel} htmlFor="outlined-age-native-simple">
        {label}
      </InputLabel>
      <Select
        native
        labelWidth={labelWidth}
        style={{height:65}}
      >
        {
          props.defaultNull ? <option value="" /> : ''
        }
        {
          data.map((item, index) => {
            return(
              <option key={index} value={item.value}>{item.text}</option>
            )
          })
        }
      </Select>
    </FormControl>
  );
}