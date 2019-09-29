import React, {Component} from 'react';

class Menu extends Component{
    render(){
        return(
            <div className="static-content">
                <div className="page-content">
                    
                    {/* @include('sitemanager._layout.heading') */}

                    <div className="page-heading">            
                        <h1>Menu</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <a href="#" className="btn btn-primary">
                                    <i className="fa fa-plus"></i> Add Menu
                                </a>
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>keren</td>
                                                    <td>www.keren.com</td>
                                                    <td className="text-center">
                                                        <a href="#" className="btn btn-success btn-xs btn-label">
                                                            <i className="fa fa-pencil"></i> Edit
                                                        </a>
                                                        &nbsp;
                                                        <a href="#" className="btn btn-danger btn-xs btn-label">
                                                            <i className="fa fa-trash-o"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
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

export default Menu;