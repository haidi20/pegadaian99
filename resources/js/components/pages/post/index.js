import React, {Component} from 'react';
import { Link } from "react-router-dom";
import {connect} from 'react-redux';
import axios from 'axios';

import { EditorState, convertFromRaw, convertToRaw } from 'draft-js';
import { Editor} from 'react-draft-wysiwyg';
import draftToHtml from 'draftjs-to-html';
import 'react-draft-wysiwyg/dist/react-draft-wysiwyg.css';

class PostForm extends Component{
    constructor(props){
        super(props)

        this.state = {
            image: null,
            showImage: null,
            editorState: EditorState.createEmpty(),
        }

        this.save           = this.save.bind(this);
        this.changeValue    = this.changeValue.bind(this);
        this.onEditorStateChange = this.onEditorStateChange.bind(this);

    }

    save(){
        // console.log(this.state.image);
        const image = this.state.image;
        let formData = new FormData();

        formData.append('image', image);
        formData.append('name', 'nata');

        axios({
            url: '/api/post/store',
            method: 'POST',
            data: formData
        }).then((res) => {
            // console.log(res)
            this.setState({
                showImage: res.data.data
            })

            // console.log(this.state.showImage);
        }).catch(err => {
            console.log(err);
        })
    }

    changeValue (event) {        
        // console.log(event.target.files, 'file');
        // console.log(event.target.files[0], 'file dengan array');

        const file = event.target.files[0];

        this.setState({
            image: file
        })

    }

    onEditorStateChange(editorState) {
        // console.log(editorState)
        this.setState({
          editorState,
        });

        const editorHTML = draftToHtml(convertToRaw(editorState.getCurrentContent()))
        console.log(editorHTML);
    };

    componentDidMount(){

    }

    render(){
        const { editorState } = this.state;
        return(
            <div className="static-content">
                <div className="page-content">
                    
                    {/* @include('sitemanager._layout.heading') */}

                    <div className="page-heading">            
                        <h1> Post</h1>
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
                                        <h2>Form Post</h2>
                                    </div>
                                    <div className="panel-body">
                                        <form className="form-horizontal">
                                            <div className="form-group row">
                                                <label className="col-sm-2 col-form-label">Image</label>
                                                <div className="col-sm-10">
                                                    <input type="file" defaultValue={this.state.image} onChange={this.changeValue} name="image" id="image" />
                                                </div>
                                            </div>
                                            <div className="form-group row">
                                            <Editor
                                                editorState={editorState}
                                                onEditorStateChange={this.onEditorStateChange}    
                                                toolbar={{
                                                inline: { inDropdown: true },
                                                list: { inDropdown: true },
                                                textAlign: { inDropdown: true },
                                                link: { inDropdown: true },
                                                history: { inDropdown: true },
                                                // image: { uploadCallback: uploadImageCallBack, alt: { present: true, mandatory: true } },
                                                }}
                                            />
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

                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-md-12">
                                <div className="panel panel-default">
                                    <div className="panel-body">
                                       {
                                           this.state.showImage ? <img src={this.state.showImage} /> : null
                                       }
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
      
    }
}

export default connect(mapStateToProps)(PostForm);