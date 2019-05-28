@extends('_layouts.default')

@section('script-bottom')
<script>
    function checklist(id)
    {
        window.location.href = '{{url("akad/change-checklist")}}/'+id;
    }
</script>
@endsection

@section('content')
{{-- include file modal  --}}
@include('akad.modal.index.prosedur')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Maintenance</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form method="get">
                <div class="card-block">
                        <div class="sub-title">
                            <h6>Data Maintenance</h6>
                        </div>
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
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <select name="by" id="by" class="form-control">
                                            @foreach ($column as $index => $item)
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
                                @foreach ($column as $index => $item)
                                    <th>{{$item}}</th>
                                @endforeach
                                <th width="100px">Ceklis</th>
                                <th width="100px">Print</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->no_id}}</td>
                                        <td>{{$item->nama_lengkap}}</td>
                                        <td>{{$item->nama_barang}}</td>
                                        <td>{{$item->tanggal_akad}}</td>
                                        <td align="center">
                                            <div class="border-checkbox-section">
                                                <div class="border-checkbox-group border-checkbox-group-primary">
                                                    <input 
                                                        class="border-checkbox" 
                                                        type="checkbox" 
                                                        id="checkbox{{$index}}"
                                                        onClick="checklist({{$item->id_akad}})" 
                                                        value="{{$item->maintenance}}"
                                                        {{$item->maintenance == 1 ? 'checked' : ''}}
                                                    >
                                                    <label class="border-checkbox-label" for="checkbox{{$index}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-success mb-1">
                                                <i class="zmdi zmdi-print"></i>
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
                    {!! $data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                   
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
