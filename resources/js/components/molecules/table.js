// source
// https://codepen.io/private_ryan/pen/RVBdpO

$(document).ready(function() {
  $('#tableSample').DataTable();
} );

class AddFormData extends React.Component {
	constructor(props) {
	    super(props);
	    this.state = { textName: '', textArea: '' };
	    this.onFormSubmit = this.onFormSubmit.bind(this);
	    this.textNameChange = this.textNameChange.bind(this);
	    this.textDescChange = this.textDescChange.bind(this);
	    this.cancelUpd = this.cancelUpd.bind(this);
	}

	componentWillReceiveProps(nextProps){
		if (nextProps.upd.id) {
			this.setState({
				textName: nextProps.upd.name,
				textArea: nextProps.upd.desc
			});
		}else{
			this.setState({ textName:'', textArea: '' });
		}
	}

	textNameChange(e){ this.setState({ textName: e.target.value }) }
	textDescChange(e){ this.setState({ textArea: e.target.value }) }

	onFormSubmit(e) {
		e.preventDefault();
		if (this.props.upd.id) {
			// update component
			this.props.propUpd({ 
				id: this.props.upd.id, 
				name: this.state.textName, 
				desc: this.state.textArea 
			});
		} else {
			var formVal = {
				name: this.state.textName,
				area: this.state.textArea
			}
			this.props.onAdd(formVal);
		}
		this.setState({ textName:'', textArea: '' });
	}
	cancelUpd() {
		this.props.updcan();
		this.setState({ textName:'', textArea: '' });
	}

    render() {
        return (<form onSubmit={ this.onFormSubmit } className='well'>
        		<h1>{ this.props.upd.id ? 'Update Form':'Insert Form' }</h1>
                <div className='form-group'>
				    <label>Name</label>
				    <input type='text' className='form-control' 
				    	onChange={ this.textNameChange } 
				    	value={ this.state.textName  } />
				</div>
				<div className='form-group'>
				    <label>Description</label>
				    <textarea className="form-control" rows="3" 
				    	onChange={ this.textDescChange } 
				    	value={ this.state.textArea } 
				    ></textarea>
				</div>
               	<button type="submit" className="btn btn-success">
               		{ this.props.upd.id ? 'Save changes': 'Submit' }
               	</button>&nbsp;
               	{
               		this.props.upd.id ? 
               		(<button type="button" 
               			onClick={ this.cancelUpd } 
               			className="btn btn-default" >Cancel</button>
               		):null
               	}
            </form>   
        );
    }
}

class TableBody extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.state = { isToggleOn: false };
        this.updateBtn = this.updateBtn.bind(this);
        this.handleCbox = this.handleCbox.bind(this);
    }

    updateBtn(e) {
        this.props.onUpd( e.target.dataset.item );
    }

    handleCbox() {
        this.setState(prevState => ({
          isToggleOn: !prevState.isToggleOn
        }));
        var cnt = $('#tableSample').find('input:checkbox[name=cbox]:checked');
        if (cnt.length) {
            $('#del_rowBtn').show();
        }else{
            $('#del_rowBtn').hide();
        }
        this.props.canHan();
    }

    render() {
        const divStyle = {
          margin: 0,
        };

        return (
                <tr id={'tr-'+ this.props.TRs.id.toString() } >
                    <td>
                    <div className="checkbox" style={ divStyle } >
                        <label>
                            <input name='cbox' onChange={ this.handleCbox } 
                                    type="checkbox" 
                                    id={ 'check_bx'+ this.props.TRs.id }
                                    value={this.props.TRs.id} /> 
                            &nbsp;{ this.props.TRs.id }</label>
                        </div>
                    </td>
                    <td>{ this.props.TRs.name }</td>
                    <td>{ this.props.TRs.desc }</td>
                    <td>
                        { this.state.isToggleOn ? (
                            <button disabled className="btn btn-xs btn-default" >Edit</button>
                            ):(
                            <button onClick={ this.updateBtn } 
                                    data-item={ this.props.TRs.id } 
                                    className="btn btn-xs btn-default" >
                            Edit</button>        
                            )
                        }    
                        </td>
                </tr>
        );
    }
}

class SampleTable extends React.Component {
    constructor(props, context) {
        super(props);
        
        this.state = {
            TRs: [
              {
                id: 1,  
                name: 'rock',
                desc: 'A form of solid matter that can break the head whoever hits'
              }
            ],
            UPD:[]
        };
        this.deleteRow = this.deleteRow.bind(this);
        this.onAddForm = this.onAddForm.bind(this);
        this.delNrow = this.delNrow.bind(this);
        this.updateRow = this.updateRow.bind(this);
        this.cancelUpd = this.cancelUpd.bind(this);
        this.propcessUpd = this.propcessUpd.bind(this);
    }
    // delete multiple data
    deleteRow(z) {
        var array = this.state.TRs;
        var index = array.findIndex(e => e.id == z)
        array.splice(index, 1);
        this.setState({ TRs: array });
    }

    delNrow() {
        var cof = confirm('are you sure !!');
        if (cof) {
            const tbox = $('#tableSample').find('input:checkbox[name=cbox]:checked');
            var arr = [];
            tbox.each(function(){
                arr.push(parseInt($(this).val()));
            });
            for (var i = 0; i < arr.length; i++) {
                this.deleteRow(arr[i]);
            }
            $('#del_rowBtn').hide();
        }
    } // end of delete function

    // add form data
    onAddForm(formVal) {
        var ctr = this.state.TRs.length + 1;
        var Ndata = {
            id: ctr,
            name: formVal.name,
            desc: formVal.area
        }
        this.setState({ TRs: this.state.TRs.concat([Ndata]), UPD: {} })
    } // end add form function

    updateRow(x) {
        var array = this.state.TRs;
        var index = array.findIndex(e => e.id == x);
        this.setState({
            UPD: this.state.TRs[index]
        });
    }

    cancelUpd() {
        this.setState({ UPD: [] });
    }
    
    propcessUpd(formVal) {
        var obj = this.state.TRs;
        var index = obj.findIndex(e => e.id == formVal.id)
        obj[index] = formVal;
        this.setState({ TRs: obj, UPD: [] });
    }

    componentDidMount(){
        // this.setState({ TRs: this.props.tableRow })
    }
    render() {
        const display = {
            display: 'none'
        }
        const tRow = this.state.TRs.map(tr => (
            <TableBody onUpd={this.updateRow} TRs={ tr } key={tr.id} canHan={ this.cancelUpd } />
        ))

        return (
            <div className='row margin-top'>
                <div className='col-md-4'>
                    <AddFormData onAdd={ this.onAddForm } 
                        upd={ this.state.UPD } 
                        updcan={ this.cancelUpd } 
                        propUpd= { this.propcessUpd } />
                </div>
                <div className='col-md-8'>
                    <div className='row h35'>
                        <div className='col-md-6'>
                            <button onClick={ this.delNrow } id='del_rowBtn' 
                                    className='btn btn-xs btn-default' 
                                    style={display} >Delete in Row</button>
                        </div>
                        <div className='col-md-offset-2 col-md-4'>
                        </div>
                    </div>
                    <table className="table table-hover table-striped table-bordered" id='tableSample' >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>{ tRow }</tbody>
                    </table>
                </div>    
            </div>
            );
    }
}

var Mydata = function(){
  var obj = [];
  $.ajax({
    async: false,
    global: false,
    dataType: 'json',
    type:'GET',
    url: 'http://jsonplaceholder.typicode.com/posts',
    success:function(data){
      for (var i = 0; i < 3; i++) {
        obj[i] = {
          'id': i+1,
          'name': data[i].title,
          'desc': data[i].body     
        };
      } 
    }
  });
  return obj;
}();

ReactDOM.render(
  <SampleTable tableRow={Mydata} />,
  document.getElementById('displayTable')
);
