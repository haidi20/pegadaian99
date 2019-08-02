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

<!-- jquery redirect -->
<script type="text/javascript" async src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>

<script>
    $(function(){

    });
</script>

@include('akad.modal.index.prosedur.js-custom')
@include('akad.modal.index.action.js-custom')
@endsection

@section('content')
{{-- include file modal  --}}
@include('akad.modal.index.prosedur.index')
@include('akad.modal.index.action.index')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Ringkasan Harian</h4>
                    {{-- <span>Rincian Dana</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    @include('akad.index.ringkasan-akad.table', [
        'title' => 'Data Akad',
        'data' => $dataAkad,
    ])
    @include('akad.index.ringkasan-akad.table', [
        'title' => 'Data Pendapatan', 
        'data' => $dataPendapatan,
    ])
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="sub-title">
                    <h6>Realisasi Pinjaman</h6>
                    <div class="view-info">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="general-info">
                                    <div class="row" id="data-realisasi-pinjaman">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="">
                                                <table class="table m-0">
                                                    <tbody id="table-detail-one">
                                                        <tr>
                                                            <td>Akad Baru </td>
                                                            <td class="akad_baru">: {{$akadBaru}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Akad Ulang </td>
                                                            <td class="akad_ulang">: {{$akadUlang}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Realisasi</td>
                                                            <td>: {{$totalRealisasi}} </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br><br>
                                                <table class="table m-0">
                                                    <tbody id="table-detail-one">
                                                        <tr>
                                                            <td>Pendapatan B. Titip</td>
                                                            <td>: {{$pendapatanBtitip}} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>pendapatan B. Admin</td>
                                                            <td>: {{$pendapatanBadmin}} </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- end of table col-lg-6 -->
                                    </div>
                                    <!-- end of row -->
                                </div>
                                <!-- end of general info -->
                            </div>
                            <!-- end of col-lg-12 -->
                        </div>
                        <!-- end of row -->
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
