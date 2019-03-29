@extends('_layouts.default')

@section('script-top')
    <!-- Range slider css -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/seiyria-bootstrap-slider/css/bootstrap-slider.css')}}">

<!-- Date-time picker css -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">

<!-- Date-range picker css  -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}">
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
                    <h5>Waktu Rentang Laporan Dana</h5>
                    <hr/>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 m-b-30">
                            <input type="text" name="daterange" class="form-control" value="01/01/2015 - 01/31/2015" />
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="sub-title">Modal Setiap Cabang</div>
                </div>
                <div class="card-block">
                     <!-- Row start -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <form method="get" class="form-inline">
                                <div class="form-group float-right">
                                    {{-- By &nbsp;
                                    <select name="by" id="by" class="form-control">
                                        @foreach($selectBy as $index => $item)
                                            <option value="{{$item}}" {{selected($item, 'by', 'request')}}>{{$item}}</option>
                                        @endforeach
                                    </select>
                                    &nbsp; --}}
                                    Search &nbsp; : &nbsp;
                                    <input type="text" name="q" id="q" class="form-control" value="{{ request('q') }}" placeholder="">
                                    <button type="submit" class="btn btn-default" id="btn-search">Oke</button>
                                </div>
                            </form>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Nomor Cabang</th>
                                            <th>Nama Cabang</th>
                                            <th class="text-right">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($cabang as $index => $item)
                                            <tr>
                                                <td>{{$item->no_cabang}}</td>
                                                <td>{{$item->nama_cabang}}</td>
                                                <td class="text-right">Rp.540.000.00,-</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" align="center">No data available in table</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {!! $cabang->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}
                            </div>
                            <div class="text-right  m-r-20">
                                {{-- <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a> --}}
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card bg-c-yellow text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Modal Keseluruhan</p>
                            <h4 class="m-b-0">Rp.1.300.000.00,-</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="feather icon-credit-card f-50 text-c-yellow"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card bg-c-green text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Total Sisa Modal</p>
                            <h4 class="m-b-0">Rp.500.000.00,-</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="feather icon-credit-card f-50 text-c-green"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Nasabah</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    {{-- <p class="text-c-green f-w-500"><i class="feather icon-chevrons-up m-r-5"></i> 18% High than last month</p> --}}
                    <div class="row">
                        <div class="col-3 b-r-default">
                            <p class="text-muted m-b-5">Pinjaman Nasabah</p>
                            <h6>Rp. 574.000.00,-</h6>
                        </div>
                        <div class="col-2 b-r-default">
                            <p class="text-muted m-b-5">Hutang</p>
                            <h6>Rp. 63.000.00,-</h6>
                        </div>
                        <div class="col-2 b-r-default">
                            <p class="text-muted m-b-5">Piutang</p>
                            <h6>Rp. 2.900.000.00,-</h6>
                        </div>
                        <div class="col-2 b-r-default">
                            <p class="text-muted m-b-5">Refund</p>
                            <h6>Rp. 8.400.000.00,-</h6>
                        </div>
                        <div class="col-3 b-r-default">
                            <p class="text-muted m-b-5">Sisa Saldo</p>
                            <h6>Rp. 72.400.000.00,-</h6>
                        </div>
                    </div>
                </div>
                {{-- <canvas id="tot-lead" height="150"></canvas> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pendapatan</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    {{-- <p class="text-c-green f-w-500"><i class="feather icon-chevrons-up m-r-5"></i> 18% High than last month</p> --}}
                    <div class="row">
                        <div class="col-3 b-r-default">
                            <p class="text-muted m-b-5">Pendapatan B.Titip Bulan</p>
                            <h6>Rp. 0</h6>
                        </div>
                        <div class="col-3 b-r-default">
                            <p class="text-muted m-b-5">Pendapatan B.Admin Akad</p>
                            <h6>Rp. 0</h6>
                        </div>
                        <div class="col-3 b-r-default">
                            <p class="text-muted m-b-5">Pendapatan B.Admin Lelang</p>
                            <h6>Rp. 0</h6>
                        </div>
                        <div class="col-3">
                            <p class="text-muted m-b-5">Jumlah Akad Bulan</p>
                            <h6>270</h6>
                        </div>
                    </div>
                </div>
                {{-- <canvas id="tot-lead" height="150"></canvas> --}}
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Operasional</h4>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    {{-- <p class="text-c-green f-w-500"><i class="feather icon-chevrons-up m-r-5"></i> 18% High than last month</p> --}}
                    <div class="row">
                        <div class="col-4 b-r-default">
                            <p class="text-muted m-b-5">Saldo Kas Administrasi</p>
                            <h6>Rp. 0</h6>
                        </div>
                        <div class="col-4 b-r-default">
                            <p class="text-muted m-b-5">Hutang Biaya Operasional</p>
                            <h6>Rp. 0</h6>
                        </div>
                        <div class="col-4 b-r-default">
                            <p class="text-muted m-b-5">Biaya Operasional</p>
                            <h6>Rp. 3.961.100.00,-</h6>
                        </div>
                    </div>
                </div>
                {{-- <canvas id="tot-lead" height="150"></canvas> --}}
            </div>
        </div>  
    </div>
@endsection

<!-- <form method="get" class="form-inline">
                        <div class="form-group float-right">
                            {{-- By &nbsp;
                            <select name="by" id="by" class="form-control">
                                @foreach($selectBy as $index => $item)
                                    <option value="{{$item}}" {{selected($item, 'by', 'request')}}>{{$item}}</option>
                                @endforeach
                            </select>
                            &nbsp; --}}
                            Search &nbsp; : &nbsp;
                            <input type="text" name="q" id="q" class="form-control" value="{{ request('q') }}" placeholder="">
                            <button type="button" class="btn btn-default" id="btn-search">Oke</button>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th>Nomor Cabang</th>
                                    <th>Nama Cabang</th>
                                    <th class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cabang as $index => $item)
                                    <tr>
                                        <td>{{$item->no_cabang}}</td>
                                        <td>{{$item->nama_cabang}}</td>
                                        <td class="text-right">Rp.540.000.00,-</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" align="center">No data available in table</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $cabang->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}
                    </div>
                    <div class="text-right  m-r-20">
                        {{-- <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a> --}}
                    </div>
