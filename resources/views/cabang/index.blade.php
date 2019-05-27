@extends('_layouts.default')

@section('script-top')
<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css')}}">
<style>
    .custom-font{
        /* font-size: 12px; */
        width:1px;
    }
</style>
@endsection

@section('script-bottom')
<!-- data-table js -->
<script src="{{asset('adminty/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script>
     $(document).ready(function() {
        $('#res-config').DataTable({
            responsive: true
        });
        var newcs = $('#new-cons').DataTable();

        new $.fn.dataTable.Responsive(newcs);

        $('#show-hide-res').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: ''
                }
            }
        });
    });
</script>
@endsection

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
<form method="get">
<div class="page-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
             {!! session()->get('message') !!}
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-sm-12 col-md-12">
             <div class="card">
                 <div class="card-header">
                    <h5>Waktu Rentang Laporan Dana</h5>
                    <hr/>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <input type="text" name="daterange" class="form-control" value="{{$dateRange}}" />
                            <input type="text" name="daterange" class="form-control" value="" />
                        </div>
                        <div class="col-sm-12 col-md-2 text-right">
                            <button type="submit" class="btn btn-default" id="btn-search">Oke</button>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Waktu Rentang Laporan Dana</h5>
                    <hr/>
                </div>
                <div class="card-block">
                    <div class="table-responsive dt-responsive">
                        <table id="new-cons" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Nomor Cabang</th>
                                    @foreach ($nameData as $index => $item)
                                        <th class="custom-font">{{$item}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cabang as $index => $item)
                                    <tr>
                                        <td>{{$item->no_cabang}}</td>
                                        @foreach ($nameData as $key => $value)
                                            <td class="custom-font">{{$data[$key][$item->id_cabang]}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {!! $nasabah->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection