import React, {Component, Fragment} from 'react';
import TimeAkad from '../../molecules/akad/TimeAkad';
import InsuranceItem from '../../molecules/akad/InsuranceItem';

class BasePenafsiranAkad extends Component{
    render(){
        return(
            <Fragment>
                <TimeAkad/>
                <br/>
                // <InsuranceItem/>
            </Fragment>

        )
    }
}

export default BasePenafsiranAkad;