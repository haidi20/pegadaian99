@extends('_layouts.default')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Data Cabang</h4>
                    <span>Rincian Dana</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
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
             <div class="card">
                 <div class="card-header">
                    <h5>Waktu Rentang Laporan Dana</h5>
                    <hr/>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 col-xl-4 m-b-30">
                            <input type="text" name="daterange" class="form-control" value="01/01/2015 - 01/31/2015" />
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Modal Setiap Cabang</h5>
                </div>
                <div class="card-block">
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
                                <tr>
                                    <td>01</td>
                                    <td>SUHARTATIK</td>
                                    <td class="text-right">Rp.540.000.00,-</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>MAMA OKA</td>
                                    <td class="text-right">Rp.760.000.00,-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right  m-r-20">
                        {{-- <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-xl-6 col-md-6">
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
        <div class="col-xl-6 col-md-6">
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
        <div class="col-xl-12 col-md-12">
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
        <div class="col-xl-12 col-md-12">
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
        <div class="col-xl-12 col-md-12">
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
