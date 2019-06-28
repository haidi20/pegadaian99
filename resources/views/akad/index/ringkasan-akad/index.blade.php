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
                    <h4 class="">Ringkasana Akad</h4>
                    {{-- <span>Rincian Dana</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
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
                                                                <td class="akad_baru">: </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Akad Ulang </td>
                                                                <td class="akad_ulang">: </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br><br>
                                                    <table class="table m-0">
                                                        <tbody id="table-detail-one">
                                                            <tr>
                                                                <td>Pendapatan B. Titip</td>
                                                                <td>:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>pendapatan B. Admin</td>
                                                                <td>:</td>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form method="get">
                <div class="card-block">
                        <!-- Row start -->
                        <div class="row">
                        <div class="col-sm-12 col-md-2">
                                <div class="form-group">
                                {{-- Show &nbsp; --}}
                                <select name="perpage" id="perpage" class="form-control">
                                    <option {{ selected(10, 'perpage', 'request')}}>10</option>
                                    <option {{ selected(25, 'perpage', 'request')}}>25</option>
                                    <option {{ selected(50, 'perpage', 'request')}}>50</option>
                                    <option {{ selected(100, 'perpage', 'request')}}>100</option>
                                </select> 
                                {{-- &nbsp; Entries --}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 offset-md-4">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 offset-md-1">
                                    <div class="form-group">
                                        <select name="by" id="by" class="form-control">
                                            {{-- @foreach($column as $index => $item)
                                                <option value="{{$index}}" {{selected($index, 'by', 'request')}}>{{$item}}</option>
                                            @endforeach --}}
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
                        </div>
                    </div><br>
                    </form>
                    <div class="table-responsive dt-responsive">
                        <table id="dt-ajax-array" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                {{-- @foreach($column as $index => $item)
                                    <th>{{$item}}</th>
                                @endforeach --}}
                                <th>Prosedur</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            {{-- <tfoot>
                            </tfoot> --}}
                        </table>
                    </div>
                    {{-- {!! $data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                    --}}
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
