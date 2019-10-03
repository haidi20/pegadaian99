import React, {Component} from 'react';
import { Link } from "react-router-dom";
import {connect} from 'react-redux';

class MenuForm extends Component{
    constructor(props){
        super(props)

        this.state = {
            data: {
                id: this.props.data.length + 1,
                name: '',
                link: '',
            },
            titleForm: ''
        }
    }

    async save(data){
        console.log('data', data);
    }

    componentDidMount(){
        const id = Number(this.props.match.params.id);
        console.log(this.props);

        if(id){
            const media = this.props.data.find(media => id === media.id);
            
            this.setState(
                {
                    data: {...media},
                    typeForm: 'Edit'
                }                
            );
        }else{
            this.setState({typeForm: 'Add'})
        }
    }

    render(){
        return(
            <div className="static-content">
                <div className="page-content">
                    
                    {/* @include('sitemanager._layout.heading') */}

                    <div className="page-heading">            
                        <h1>{this.state.typeForm} Media Sosial</h1>
                        <div className="options">
                            <div className="btn-toolbar">
                                <Link to="/" className="btn btn-default"><i className="fa fa-reply"></i> Back</Link>
                            </div>
                        </div>
                    </div>

                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">
                                
                                <div className="panel panel-default">
                                    <div className="panel-heading">
                                        <h2>Form Media Sosial</h2>
                                    </div>
                                    <div className="panel-body">
                                        <form className="form-horizontal">
                                            <div className="form-group row">
                                                <label className="col-sm-2 col-form-label" htmlFor="nama">Nama</label>
                                                <div className="col-sm-10">
                                                    <input defaultValue={this.state.data.name} type="text" className="form-control" name="nama" id="nama" required />
                                                </div>
                                            </div>
                                            <div className="form-group row">
                                                <label className="col-sm-2 col-form-label" htmlFor="link">Alamat Link</label>
                                                <div className="col-sm-10">
                                                    <input defaultValue={this.state.data.link} type="text" className="form-control" name="link" id="link" required />
                                                </div>
                                            </div>
                                            <div className="panel-footer">
                                                <div className="row">
                                                    <div className="col-sm-10 col-sm-offset-2">
                                                        <Link to='/' className="btn-default btn">
                                                        <i className="fa fa-reply"></i> Back
                                                        </Link>
                                                        &nbsp;
                                                        <a className="btn-primary btn" onClick={ () => this.save(this.state.data)}>
                                                            <i className="fa fa-save"></i> Save
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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

export default connect(mapStateToProps)(MenuForm);