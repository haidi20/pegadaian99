@extends('_layouts.default')

@section('script-top')
<!-- Range slider css -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/seiyria-bootstrap-slider/css/bootstrap-slider.css')}}">
<!-- Date-time picker css -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
<!-- Date-range picker css  -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css')}}">
@endsection

@section('script-bottom')
<!-- Bootstrap date-time-picker js -->
<script type="text/javascript" src="{{asset('adminty/files/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Date-range picker js -->
<script type="text/javascript" src="{{asset('adminty/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<!-- Date-dropper js -->
<script type="text/javascript" src="{{asset('adminty/files/bower_components/datedropper/js/datedropper.min.js')}}"></script>
<!-- Color picker js -->
<script type="text/javascript" src="{{asset('adminty/files/bower_components/spectrum/js/spectrum.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/jscolor/js/jscolor.js')}}"></script>

<script type="text/javascript" src="{{asset('adminty/files/assets/pages/advance-elements/custom-picker.js')}}"></script>

<!-- data-table js -->
<script src="{{asset('adminty/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

@include('pembayaran.js-custom')
@endsection

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Data B.Titip & Admin</h4>
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
                    <div class="sub-title">List Biaya Titip</div>
                </div>
                <form method="get">
                <div class="card-block">
                     <!-- Row start -->
                    <div class="row">
                        <!-- perpage -->
                        <form action="{{route('pembayaran.pendapatan')}}">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="daterange" id="date" class="form-control" value="{{$biayaTitip->dateRange}}" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="type_money" id="type_money" class="form-control" >
                                    <option value="all" {{ selected('all', 'type_money', 'request')}}>Semua Jenis Uang</option>
                                    <option value="debit" {{ selected('debit', 'type_money', 'request')}}>Jenis Uang Masuk</option>
                                    <option value="kredit" {{ selected('kredit', 'type_money', 'request')}}>Jenis Uang Keluar</option>
                                </select> 
                            </div>
                            <div class="col-sm-2 col-md-2">
                                <button type="submit" class="btn btn-success btn-sm" id="btn-search">Oke</button>
                            </div>
                        </form>
                        {{-- <div class="col-md-1"></div> --}}
                        {{-- <div class="col-sm-12 col-md-6 offset-md-1">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 offset-md-1">
                                    <div class="form-group">
                                        <select name="by" id="by" class="form-control">
                                            @foreach($columnBiayaTitip as $index => $item)
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
                        </div> --}}
                    </div><br>
                    </form>
                    <div class="table-responsive dt-responsive">
                        <table id="list_biaya_titip"  class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                @foreach($columnBiayaTitip as $index => $item)
                                    <th>{{$item}}</th>
                                @endforeach
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($biayaTitip->data as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->tanggal_akad}}</td>
                                        <td>{{$item->nama_lengkap}}</td>
                                        <td>{{$item->no_id}}</td>
                                        <td>{{$item->nominal_pembayaran}}</td>
                                        <td>{{$item->nominal_kredit}}</td>
                                        <td>{{$item->nominal_saldo}}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-mini btn-primary">
                                                Edit
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-mini btn-danger">
                                                Reset
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" align="center">No data available in table</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tr>
                                <td colspan="6" style="text-align: right">Total</td>
                                <td colspan="2">Rp. {{$biayaTitip->total}}</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    {{-- {!! $biayaTitip->data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}     --}}
                    <form action="{{route('pembayaran.cair-pendapatan')}}" method="GET">
                    <div class="row">
                        <div class="offset-md-8">
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="nominal">Nominal</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                        <input type="text" class="form-control autonumber" name="nominal" id="nominal" required>
                                        <input type="hidden" name="total" value="{{$biayaTitip->total}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-md-8">
                            
                        </div>
                        <div class="col-md-4" align="right">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="keterangan">Keterangan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Proses</button>
                        </div>
                    </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="sub-title">List Biaya Administrasi</div>
                </div>
                <form method="get">
                <div class="card-block">
                     <!-- Row start -->
                     <div class="row">
                        <div class="col-sm-12 col-md-2">
                             <div class="form-group">
                                {{-- Show &nbsp; --}}
                                <select name="perpage_adm" id="perpage_adm" class="form-control">
                                    <option {{ selected(10, 'perpage_adm', 'request')}}>10</option>
                                    <option {{ selected(25, 'perpage_adm', 'request')}}>25</option>
                                    <option {{ selected(50, 'perpage_adm', 'request')}}>50</option>
                                    <option {{ selected(100, 'perpage_adm', 'request')}}>100</option>
                                </select> 
                                {{-- &nbsp; Entries --}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 offset-md-4">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 offset-md-1">
                                    <div class="form-group">
                                        <select name="by_adm" id="by_adm" class="form-control">
                                            @foreach($columnBiayaAdministrasi as $index => $item)
                                                <option value="{{$index}}" {{selected($index, 'by_adm', 'request')}}>{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <div class="input-group input-group-success">
                                        <span class="input-group-addon">
                                           <i class="icofont icofont-ui-search"></i>
                                        </span>
                                        <input type="text" name="q_adm" id="q_adm" value="{{ request('q_adm') }}" class="form-control" placeholder="Search">
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
                                @foreach($columnBiayaAdministrasi as $index => $item)
                                    <th>{{$item}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse($administrasi as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->tanggal_akad}}</td>
                                        <td>{{$item->nominal}}</td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" align="center">No data available in table</td>
                                    </tr>
                                @endforelse --}}
                            </tbody>
                            {{-- <tfoot>
                            </tfoot> --}}
                        </table>
                    </div>
                    {{-- {!! $administrasi->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!} --}}
            </div>
        </div>
    </div>
@endsection