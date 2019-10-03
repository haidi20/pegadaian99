import React, {Component} from 'react';
import { Link } from "react-router-dom";
import {connect} from 'react-redux';

class MenuForm extends Component{
    constructor(props){
        super(props)

        this.state = {
            data: {
                id: 4,
                name: '',
                link: '',
            },
            titleForm: ''
        }

        this.save           = this.save.bind(this);
        this.changeValue    = this.changeValue.bind(this);
    }

    save(){
        const {data} = this.state;

        const insert = this.props.dispatch({
            type: 'UPDATE_MEDIA',
            data,
        });

        console.log(this.props.data);

        // if(insert) {
            // this.props.history.push('/');
            // console.log(this.props.data);
        // }
    }

    changeValue (event) {        
        const newData = {...this.state.data};

        newData[event.target.name] = event.target.value;

        this.setState({
            data: newData
        })

        console.log(this.state.data);
    }

    componentDidMount(){
        const id = Number(this.props.match.params.id);

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
                                                <label className="col-sm-2 col-form-label" htmlFor="name">Nama</label>
                                                <div className="col-sm-10">
                                                    <input defaultValue={this.state.data.name} onChange={this.changeValue} type="text" className="form-control" name="name" id="name" required />
                                                </div>
                                            </div>
                                            <div className="form-group row">
                                                <label className="col-sm-2 col-form-label" htmlFor="link">Alamat Link</label>
                                                <div className="col-sm-10">
                                                    <input defaultValue={this.state.data.link} onChange={this.changeValue} type="text" className="form-control" name="link" id="link" required />
                                                </div>
                                            </div>
                                            <div className="panel-footer">
                                                <div className="row">
                                                    <div className="col-sm-10 col-sm-offset-2">
                                                        <Link to='/' className="btn-default btn">
                                                        <i className="fa fa-reply"></i> Back
                                                        </Link>
                                                        &nbsp;
                                                        <a className="btn-primary btn" onClick={this.save}>
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