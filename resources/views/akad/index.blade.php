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
     $(function(){

        // for if want to filter data from date, can redirect to akad.index
        $('.applyBtn').on('click', function(){
            this.form.submit()
            console.log('klik')
        });

        $('#perpage').change(function(){
            this.form.submit()
        });
    });
</script>
@endsection

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Data Akad</h4>
                    {{-- <span>Rincian Dana</span> --}}
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
             {!! session()->get('message') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-12">
             <div class="card">
                <div class="card-header">
                    
                </div>
                <form method="get">
                <div class="card-block">
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            {{-- <div class="sub-title">List Nasabah Akad</div> --}}
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#nasabah_akad" role="tab">Nasabah akad</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#akad_jatuh_tempo" role="tab">Akad Jatuh Tempo</a>
                                    <div class="slide"></div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Pelunasan & Lelang</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content card-block">
                                {{-- <form method="get"> --}}
                                <div class="tab-pane active" id="nasabah_akad" role="tabpanel">
                                    {{-- table list nasabah akad  --}}
                                    @include('akad.list-nasabah-akad')

                                </div>
                                {{-- </form> --}}
                                <div class="tab-pane" id="akad_jatuh_tempo" role="tabpanel">
                                    @foreach($nameTables as $index => $item)
                                        @include('akad.akad-jatuh-tempo')
                                        <br><br><br><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
