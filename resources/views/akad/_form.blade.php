@extends('_layouts.default')

@section('script-top')
<!--forms-wizard css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/jquery.steps/css/jquery.steps.css')}}">

<style>
.wizard .content {
    min-height: 100px;
}
.wizard .content > .body {
    width: 100%;
    height: auto;
    padding: 15px;
    position: relative;
}
</style>
@endsection

@section('script-bottom')
<!-- Masking js for form format number --> 
<script src="{{asset('adminty/files/assets/pages/form-masking/inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/autoNumeric.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/form-mask.js')}}"></script>

<!--Forms - Wizard js-->
<script src="{{asset('adminty/files/bower_components/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/jquery.steps/js/jquery.steps.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/jquery-validation/js/jquery.validate.js')}}"></script>

<script type="text/javascript" src="{{asset('adminty/files/assets/pages/form-validation/validate.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('adminty/files/assets/pages/forms-wizard-validation/form-wizard.js')}}"></script>
<script src="{{asset('adminty/files/assets/js/pcoded.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/assets/js/script.js')}}"></script>
@include('akad.form.form-akad-js')
@endsection

@section('content')
<!-- Form wizard with validation card start -->
<div class="card">
    <div class="card-header">
        <h3>Akad Baru</h3>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <div id="wizard">
                    <section>
                        <form class="wizard-form" id="example-advanced-form" action="#">
                            <h3> Langkah Pertama </h3>
                            <fieldset>
                                @include('akad.form.time')

                                @include('akad.form.marhun')
                            </fieldset>
                            <h3> General information </h3>
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="name-2" class="block">First name *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="name-2" name="name" type="text" class="form-control required">
                                    </div>
                                </div>
                                
                            </fieldset>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form wizard with validation card end -->
@endsection

@section('contentt')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Akad Baru</h4>
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
<form action="{{$action}}" method="post">
<input type="hidden" name="_method" value="post">
{{csrf_field()}}
<div class="page-body">
    @include('akad.form.time')

    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">No. ID</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="no_id">No. ID</label>
                        <div class="col-sm-10">
                            {{-- FYI: c99-no_cabang-tanggal_bulan_tahun-data_ke --}}
                            <input type="text" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001" disabled>
                            <input type="hidden" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('akad.form.marhun')

    @include('akad.form.rahin')
    </form>
</div>
@endsection
