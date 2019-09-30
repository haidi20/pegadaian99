import React, {Component} from 'react';
import { Link } from "react-router-dom";
import {connect} from 'react-redux';

class MenuForm extends Component{
    constructor(props){
        super(props)

        this.state = {
            id: this.props.medias.length + 1,
            name: '',
            link: '',
        }
    }   

    componentDidMount(){
        const id = Number(this.props.match.params.id);

        if(id){
            const media = this.props.medias.find(media => id === media.id);
            
            this.setState({...media});
        }
    }

    render(){
        return(
            <div className="static-content">
                <div className="page-content">
                    
                    {/* @include('sitemanager._layout.heading') */}

                    <div className="page-heading">            
                        <h1>add Media Sosial</h1>
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
                                                    <input defaultValue={this.state.name} type="text" className="form-control" name="nama" id="nama" required />
                                                </div>
                                            </div>
                                            <div className="form-group row">
                                                <label className="col-sm-2 col-form-label" htmlFor="link">Alamat Link</label>
                                                <div className="col-sm-10">
                                                    <input defaultValue={this.state.link} type="text" className="form-control" name="link" id="link" required />
                                                </div>
                                            </div>
                                            <div className="panel-footer">
                                                <div className="row">
                                                    <div className="col-sm-10 col-sm-offset-2">
                                                        <Link to='/' className="btn-default btn">
                                                        <i className="fa fa-reply"></i> Back
                                                        </Link>
                                                        &nbsp;
                                                        <button className="btn-primary btn" type="submit">
                                                            <i className="fa fa-save"></i> Save
                                                        </button>
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
      medias : state.media
    }
}

export default connect(mapStateToProps)(MenuForm);