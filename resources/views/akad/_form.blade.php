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
.modal-lg {
    max-width: 80% !important;
}
</style>
@endsection

@section('script-bottom')
<!-- Masking js for form format number --> 
{{-- <script src="{{asset('adminty/files/assets/pages/form-masking/inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/autoNumeric.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/form-mask.js')}}"></script> --}}

<!--Forms - Wizard js-->
<script src="{{asset('adminty/files/bower_components/jquery.cookie/js/jquery.cookie.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/jquery.steps/js/jquery.steps.js')}}"></script>
<script src="{{asset('adminty/files/bower_components/jquery-validation/js/jquery.validate.js')}}"></script>


<script src="{{asset('js/form-wizard.js')}}"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
@include('akad.form.form-akad-js')
@endsection

@section('content')
<!-- Form wizard with validation card start -->
@include('akad.modal.form.confirm')
<div class="card">
    <div class="card-header">
        <h3>Akad Baru</h3>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <div id="wizard">
                    <section>
                        <form class="wizard-form" id="example-advanced-form">
                            <h3> Penafsiran </h3>
                            <fieldset>
                                {{-- <button type="button" class="btn btn-primary sweet-1 m-b-10" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'sweet-1']);">Basic</button> --}}
                                @include('akad.form.time')

                                @include('akad.form.marhun')
                            </fieldset>
                            <h3> Data Nasabah </h3>
                            <fieldset>
                                @include('akad.form.rahin')
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
