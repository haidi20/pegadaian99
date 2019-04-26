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
                        window.location.href = url
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
                    <h4>Data Hutang & Pelunasan</h4>
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
    @foreach($nameTables as $index => $item)
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="sub-title">{{$item['name']}}</div>
                    </div>
                    <form method="get">
                    <div class="card-block">
                         <!-- Row start -->
                         <div class="row">
                            <div class="col-sm-12 col-md-2">
                                 <div class="form-group">
                                    {{-- Show &nbsp; --}}
                                    <select name="perpage_{{$item['key']}}" id="perpage_{{$item['key']}}" class="form-control">
                                        <option {{ selected(10, 'perpage_'.$item['key'], 'request')}}>10</option>
                                        <option {{ selected(25, 'perpage_'.$item['key'], 'request')}}>25</option>
                                        <option {{ selected(50, 'perpage_'.$item['key'], 'request')}}>50</option>
                                        <option {{ selected(100, 'perpage_'.$item['key'], 'request')}}>100</option>
                                    </select> 
                                    {{-- &nbsp; Entries --}}
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 offset-md-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 offset-md-">
                                        <div class="form-group">
                                            <select name="by_{{$item['key']}}" id="by_{{$item['key']}}" class="form-control">
                                                @foreach($column[$item['key']] as $key => $value)
                                                    <option value="{{$key}}" {{selected($key, 'by_'.$item['key'], 'request')}}>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="input-group input-group-success">
                                            <span class="input-group-addon">
                                               <i class="icofont icofont-ui-search"></i>
                                            </span>
                                            <input type="text" name="q_{{$item['key']}}" id="q_{{$item['key']}}" value="{{ request('q_'.$item['key']) }}" class="form-control" placeholder="Search">
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
                                    @if($item['key'] == 'hp')
                                        <th>Tanggal</th>
                                    @endif
                                    @foreach($column[$item['key']] as $key => $value)
                                        <th>{{$value}}</th>
                                    @endforeach
                                    @if($item['key'] != 'pc')
                                        <th>action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($item['data'] as $key => $value)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            @if($item['key'] == 'hp')
                                                {{-- for field table 'hutang'  --}}
                                                <td>{{$value->tanggal_hutang}}</td>
                                                <td>{{$value->keterangan_hutang}}</td>
                                                <td>{{$value->status_hutang}}</td>
                                                <td>Rp. {{$value->nominal_jumlah}}</td>
                                            @else
                                                {{-- for field table 'hutang_cabang'  --}}
                                                @if($item['key'] == 'hc')
                                                    <td>{{$value->uraian_hutang}}</td>
                                                @else
                                                    <td>{{$value->uraian_piutang}}</td>
                                                @endif
                                                <td>{{$value->status}}</td>
                                                <td>{{$value->jumlah}}</td>
                                            @endif
                                            @if($item['key'] == 'hp')
                                                <td align="center">
                                                    @if($value->status_hutang == 'Belum Lunas')
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary" onClick="edit('{{url('permodalan/change-status',[$value->id_hutang, 'hp'])}}')" title="Edit Data">
                                                            <i class="icofont icofont-edit icofont-lg"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            @elseif($item['key'] == 'hc')
                                                <td align="center">
                                                    @if($value->status == 'Belum Lunas')
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary" onClick="edit('{{url('permodalan/change-status',[$value->id_hutang_cabang, 'hc'])}}')" title="Edit Data">
                                                            <i class="icofont icofont-edit icofont-lg"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif
                                           {{--  @if($item['key'] == 'hp')
                                                <td>{{$value->tanggal_hutang}}</td>
                                                <td>{{$value->keterangan_hutang}}</td>
                                            @elseif($item['key'] == 'hc')
                                                <td>{{$value->uraian_hutang}}</td>
                                            @endif
                                            <td>{{$value->status_hutang}}</td>
                                            <td>Rp. {{$value->nominal_jumlah}}</td>
                                            @if($item['key'] != 'pc')
                                                <td align="center">
                                                    @if($value->status_hutang == 'Belum Lunas')
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary" onClick="edit({{$value->id_hutang}})" title="Edit Data">
                                                            <i class="icofont icofont-edit icofont-lg"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif --}}
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
                       {!! $item['data']->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                   
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection