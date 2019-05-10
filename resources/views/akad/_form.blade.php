@extends('_layouts.default')

@section('script-top')
<!--forms-wizard css-->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/jquery.steps/css/jquery.steps.css')}}">
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
@include('akad.akad-js')
@endsection

@section('content')
<!-- Form wizard with validation card start -->
<div class="card">
    <div class="card-header">
        <h5>Form Wizard With Validation</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>

    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <div id="wizard">
                    <section>
                        <form class="wizard-form" id="example-advanced-form" action="#">
                            <h3> Registration </h3>
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="userName-2" class="block">User name *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="userName-2" name="userName" type="text" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="email-2" class="block">Email *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="email-2" name="email" type="email" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="password-2" class="block">Password *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="password-2" name="password" type="password" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="confirm-2" class="block">Confirm Password *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="confirm-2" name="confirm" type="password" class="form-control required">
                                    </div>
                                </div>
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
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="surname-2" class="block">Last name *</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="surname-2" name="surname" type="text" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="phone-2" class="block">Phone #</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="phone-2" name="phone" type="number" class="form-control required phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="date" class="block">Date Of Birth</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="date" name="Date Of Birth" type="text" class="form-control required date-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">Select Country</div>
                                    <div class="col-md-8 col-lg-10">
                                        <select class="form-control required">
                                            <option>Select State</option>
                                            <option>Gujarat</option>
                                            <option>Kerala</option>
                                            <option>Manipur</option>
                                            <option>Tripura</option>
                                            <option>Sikkim</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <h3> Education </h3>
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="University-2" class="block">University</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="University-2" name="University" type="text" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="Country-2" class="block">Country</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="Country-2" name="Country" type="text" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="Degreelevel-2" class="block">Degree level #</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="Degreelevel-2" name="Degree level" type="text" class="form-control required phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="datejoin" class="block">Date Join</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="datejoin" name="Date Of Birth" type="text" class="form-control required">
                                    </div>
                                </div>
                            </fieldset>
                            <h3> Work experience </h3>
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="Company-2" class="block">Company:</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="Company-2" name="Company:" type="text" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="CountryW-2" class="block">Country</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="CountryW-2" name="Country" type="text" class="form-control required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <label for="Position-2" class="block">Position</label>
                                    </div>
                                    <div class="col-md-8 col-lg-10">
                                        <input id="Position-2" name="Position" type="text" class="form-control required">
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
