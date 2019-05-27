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

<script>
     
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
                        <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Nama Informasi</th>
                                @foreach ($cabang as $index => $item)
                                    <th>{{$item->no_cabang}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($nameData as $index => $item)
                                    <tr>
                                        <td>{{$item}}</td>
                                        @foreach ($cabang as $item)
                                            <td>{{$data[$index][$item->id_cabang]}}</td>
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