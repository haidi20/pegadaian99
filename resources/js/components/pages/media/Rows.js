import React from 'react';
import {Link} from 'react-router-dom';

function Rows (props) {
    if(!props.data.length){
        return(
            <tr>
                <td colSpan="4" align="center">null</td>
            </tr>
        )
    }else{
        return(
            props.data.map((item) => {
                return(
                    <tr key={item.id}>
                        <td>{item.id}</td>
                        <td>{item.name}</td>
                        <td>{item.link}</td>
                        <td className="text-center">
                            <Link to={`/media/edit/${item.id}`} className="btn btn-success btn-xs btn-label">
                                <i className="fa fa-pencil"></i> Edit
                            </Link>
                            &nbsp;
                            <a onClick={(id) => props.removeMedia(item.id)} className="btn btn-danger btn-xs btn-label">
                                <i className="fa fa-trash-o"></i> Delete
                            </a>
                        </td>
                    </tr>
                )
            })
        )
    }
}

export default Rows;