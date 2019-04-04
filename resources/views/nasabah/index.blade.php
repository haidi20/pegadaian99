@extends('_layouts.default')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Data Cabang</h4>
                    <span>Rincian Dana</span>
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
                    <div class="sub-title">Data Nasabah</div>
                </div>
                <div class="card-block">
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
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                       
                                        <select name="by" id="by" class="form-control">
                                            @foreach($column as $index => $item)
                                                <option value="{{$index}}" {{selected($index, 'by', 'request')}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-5">
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
                    <div class="table-responsive dt-responsive">
                        <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                @foreach($column as $index => $item)
                                    <th>{{$item}}</th>
                                @endforeach
                                {{-- <th>action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($nasabah as $index => $item)
                                    <tr>
                                        <td>{{$item->nama_lengkap}}</td>
                                        <td>{{$item->no_telp}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td></td>
                                        {{-- <td>
                                            <a href="{{route('akad.edit', $item->id)}}" class="btn btn-sm btn-info">
                                                <i class="icon-pencil3"></i> Edit
                                            </a>
                                            <a href="{{ route('akad.destroy', $item->id)}}"
                                                data-method="delete" data-confirm="Anda yakin akan menghapus data ini ?"
                                                class="btn btn-sm btn-danger" title="Hapus Data">
                                                <i class="icon-trash3"></i>
                                                Delete
                                            </a>
                                        </td> --}}
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="11" align="center">No data available in table</td>
                                </tr>
                                @endforelse
                            </tbody>
                            {{-- <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                            </tfoot> --}}
                        </table>
                    </div>
                   {!! $nasabah->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                   
                </div>
            </div>
        </div>
    </div>
@endsection