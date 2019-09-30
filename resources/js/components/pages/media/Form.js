import React, {Component} from 'react';
import { Link } from "react-router-dom";

class MenuForm extends Component{
    constructor(props){
        super(props)

        this.state = {
            id: this.props.match.params.id,
            data: this.props.location.data
        }
    }   

    componentDidMount(){
        const id = this.state.id;
        if(id){
            console.log(id);
            console.log(this.props);
        }else{
            console.log('id kosong');
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
                                                        <button className="btn-primary btn" type="submit">
                                                            <i className="fa fa-save"></i> Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        {/* {!! Form::open(['class' => 'form-horizontal']) !!}
                                            <div className="form-group {{ ($errors->first('name')) ? 'has-error' : '' }}">
                                                {!! Form::label('name', 'Nama', ['class' => 'col-sm-2 control-label']) !!}
                                                <div className="col-sm-10">
                                                    <select className="form-control" name="name">
                                                        <option value=""></option>
                                                        @foreach($social_media as $item)
                                                        <option value="{{ $item }}" @if(old('name') == $item) selected="selected" @endif>{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div className="form-group {{ ($errors->first('link')) ? 'has-error' : '' }}">
                                                {!! Form::label('link', 'Alamat Link', ['class' => 'col-sm-2 control-label']) !!}
                                                <div className="col-sm-10">
                                                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'Masukan Alamat Link']) !!}
                                                </div>
                                            </div>
                                            <div className="panel-footer">
                                                <div className="row">
                                                    <div className="col-sm-10 col-sm-offset-2">
                                                        <a href="{{ url($moduleUrl) }}" className="btn-default btn">
                                                            @fa('reply') Back
                                                        </a>
                                                        <button className="btn-primary btn" type="submit">@fa('save') Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        {!! Form::close() !!} */}
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

export default MenuForm;