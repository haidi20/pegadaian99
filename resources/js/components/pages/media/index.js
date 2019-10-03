import React, {Component} from 'react';
import { Link } from "react-router-dom";
import {connect} from 'react-redux'

class Media extends Component{
    componentDidMount(){
        console.log(this.props);
    }
    render(){
        const {data} = this.props;

        return(
            <div className="static-content">
                <div className="page-content">
                    
                    {/* @include('sitemanager._layout.heading') */}

                    <div className="page-heading">            
                        <h1>Media Sosial</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                {/* <a href="#" className="btn btn-primary"> */}
                                <Link to="/media/create" className="btn btn-primary">
                                    <i className="fa fa-plus"></i> Add Menu
                                </Link>
                                {/* </a> */}
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">
                                <div className="panel">
                                    <div className="panel-body panel-no-padding table-responsive">
                                        <table className="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th className="text-center" width="40">No</th>
                                                    <th width="300">Nama</th>
                                                    <th>link</th>
                                                    <th className="text-center" width="140">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {
                                                    data.map((item, index) => {
                                                        return(
                                                            <tr key={index}>
                                                                <td>{index + 1}</td>
                                                                <td>{item.name}</td>
                                                                <td>{item.link}</td>
                                                                <td className="text-center">
                                                                    <Link to={`/media/edit/${item.id}`} className="btn btn-success btn-xs btn-label">
                                                                        <i className="fa fa-pencil"></i> Edit
                                                                    </Link>
                                                                    &nbsp;
                                                                    <a href="#" className="btn btn-danger btn-xs btn-label">
                                                                        <i className="fa fa-trash-o"></i> Delete
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        )
                                                    })
                                                }
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div className="text-right">
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

const mapStateToProps = state => {
    return {
      data : state.medias.data
    }
}

export default connect(mapStateToProps)(Media);