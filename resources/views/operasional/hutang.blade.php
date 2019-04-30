@extends('_layouts.default')

@section('script-bottom')
    <script>
        function edit(url)
        {
            bootbox.confirm({
                message: 'Anda yakin data ini status menjadi LUNAS ?',
                buttons: {
                    confirm: {
                        label: 'OK',
                        className: 'btn-success ml-1'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-danger'
                    }
                },
                callback: function(result){
                    if(result == true){
                        console.log(url)
                        // window.location.href = url
                    }
                }
            });
        }
    </script>
@endsection

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Hutang Kas</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Form Picker</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
             {!! session()->get('message') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="sub-title">Data Hutang</div>
                </div>
                <form method="get">
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="javascript:void(0)" class="btn btn-success">Buat</a>
                        </div>
                    </div>
                    <br>
                     <!-- Row start -->
                     <div class="row">
                        <div class="col-sm-12 col-md-2">
                             <div class="form-group">
                                {{-- Show &nbsp; --}}
                                <select name="perpage" id="perpage" class="form-control">
                                    <option {{ selected(10, 'perpage', 'request')}}>10</option>
                                    <option {{ selected(25, 'perpage', 'request')}}>25</option>
                                    <option {{ selected(50, 'perpage', 'request')}}>50</option>
                                    <option {{ selected(100, 'perpage', 'request')}}>100</option>
                                </select> 
                                {{-- &nbsp; Entries --}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 offset-md-4">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 offset-md-1">
                                    <div class="form-group">
                                        <select name="by" id="by" class="form-control">
                                            @foreach($column as $index => $item)
                                                <option value="{{$index}}" {{selected($index, 'by', 'request')}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <div class="input-group input-group-success">
                                        <span class="input-group-addon">
                                           <i class="icofont icofont-ui-search"></i>
                                        </span>
                                        <input type="text" name="q" id="q" value="{{ request('q') }}" class="form-control" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <button type="submit" class="btn btn-default" id="btn-search">Oke</button>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    </form>
                    <div class="table-responsive dt-responsive">
                        <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                @foreach($column as $index => $item)
                                    <th>{{$item}}</th>
                                @endforeach
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($hutang_kas as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>Rp. {{$item->nominal_jumlah}}</td>
                                        <td>{{$item->uraian}}</td>
                                        <td>{{$item->tanggal_hutang}}</td>
                                        <td>{{$item->status_hutang}}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onClick="edit('{{url('operasional/change-status', $item->id_hutang)}}')" title="Edit Data">
                                                <i class="icofont icofont-edit icofont-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="11" align="center">No data available in table</td>
                                </tr>
                                @endforelse
                            </tbody>
                            {{-- <tfoot>
                            </tfoot> --}}
                        </table>
                    </div>
                   {!! $hutang_kas->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                   
                </div>
            </div>
        </div>
    </div>
@endsection