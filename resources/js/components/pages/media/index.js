import React, {Component} from 'react';
import { Link } from "react-router-dom";
import {connect} from 'react-redux'

import Rows from './Rows';

class Media extends Component{
    constructor(props){
        super(props);

        this.removeMedia = this.removeMedia.bind(this);
    }

    removeMedia(id){
        // console.log(id);
        const insert = this.props.dispatch({
            type: 'REMOVE_MEDIA',
            id,
        });
    }

    componentDidMount(){
        console.log(this.props);
    }
    render(){
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
                                                <Rows 
                                                    data={this.props.data} 
                                                    removeMedia={(id) => this.removeMedia(id)}
                                                />
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
      data : state.mediaReducer
    }
}

export default connect(mapStateToProps)(Media);