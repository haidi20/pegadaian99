@extends('_layouts.default')

@section('script-top')
<!-- Range slider css -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/seiyria-bootstrap-slider/css/bootstrap-slider.css')}}">
<!-- Date-time picker css -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
<!-- Date-range picker css  -->
<link rel="stylesheet" type="text/css" href="{{asset('adminty/files/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}">

<style>
    .col-md-1half {
        margin-left:15px;
    }
</style>
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
    /*
    * FYI :
    * na    = 'nasabah akad'
    * ajt   = 'akad jatuh tempo'
    * pl    = 'Pelunasan dan Lelang'
    */

    $(document).ready(function() {

        var nameTab = $('.name_tab').val()

        if(nameTab == 'seluruh_data'){
            $('.seluruh_data').addClass('active');
        }

        kondisiOpsiPembayaran(nameTab);

        $('[data-toggle="tooltip"]').tooltip();

        $('[data-toggle="popover"]').popover({
            html: true,
            content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
                // return $('#primary-popover-content').html();
            }
        });
    });

    // for bug class active on tab
    function removeActive(tab)
    {
        var dataTabs = [
            'seluruh_data', 'harian',
            'tujuh_hari', 'lima_belas_hari',
            'ringkasan_harian'
        ];

        for(var i = 0; i < dataTabs.length; i++){
            // console.log(dataTabs[i]);
            $('.name_tab').val(tab)
            if(tab != dataTabs[i]){
                $('#'+dataTabs[i]).removeClass('active');
            }
        }

        kondisiOpsiPembayaran(tab);
    }

    function kondisiOpsiPembayaran(tab)
    {
        if(tab == 'seluruh_data'){
            $('.opsi-pembayaran').show();
            $('.jangka-waktu-akad').show();
        }else{
            $('.opsi-pembayaran').hide();
            $('.jangka-waktu-akad').hide();
        }
    }

    function prosedur(type)
    {
        if(type == 'pelunasan'){
            $('#pelunasan').css('display', '')
        }else{
            $('#pelunasan').css('display', 'none')
        }

        $('#modal-prosedur-na').modal('show');
    }

    function edit(id)
    {
        $('#modal-edit').modal('show');
    }

    function review()
    {
        $('#modal-review-na').modal('show');
        
        // for close popover on button "kwitansi biaya titip"
        $('[data-toggle="popover"]').popover('hide');
    }
</script>
@endsection

@section('content')
{{-- include file modal  --}}
@include('akad.modal.index.prosedur')
@include('akad.modal.index.form')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Nasabah Akad</h4>
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
        <div class="col-sm-12 col-md-12">
             <div class="card">
                {{-- <div class="card-header">
                    
                </div> --}}
                <div class="card-block">
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            {{-- <div class="sub-title">Nasabah Akad</div> --}}
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs  tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link seluruh_data {{active_tab('seluruh_data', request('name_tab'))}}" 
                                        data-toggle="tab" 
                                        href="#seluruh_data" 
                                        onClick="removeActive('seluruh_data')" 
                                        role="tab">
                                            Seluruh Data
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{active_tab('harian', request('name_tab'))}}" 
                                        data-toggle="tab" 
                                        href="#harian" 
                                        onClick="removeActive('harian')" 
                                        role="tab">
                                            Harian
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{active_tab('tujuh_hari', request('name_tab'))}}" 
                                        data-toggle="tab" 
                                        href="#tujuh_hari" 
                                        onClick="removeActive('tujuh_hari')" 
                                        role="tab">
                                            7 Hari
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{active_tab('lima_belas_hari', request('name_tab'))}}" 
                                        data-toggle="tab" 
                                        href="#lima_belas_hari" 
                                        onClick="removeActive('lima_belas_hari')" 
                                        role="tab">
                                            15 Hari
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{active_tab('ringkasan_harian', request('name_tab'))}}" 
                                        data-toggle="tab" 
                                        href="#ringkasan_harian" 
                                        onClick="removeActive('ringkasan_harian')" 
                                        role="tab">
                                            Ringkasan Harian
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            {{-- <form method="get"> --}}
                            <div class="tab-content tabs card-block">
                                <div class="tab-pane seluruh_data {{active_tab('seluruh_data', request('name_tab'))}}" id="seluruh_data" role="tabpanel">
                                    @include('akad.index.detail.table-nasabah-akad', ['data' => $seluruhData->data, 'dateRange' => $seluruhData->dateRange])
                                </div>
                                <div class="tab-pane {{active_tab('harian', request('name_tab'))}}" id="harian" role="tabpanel">
                                    @include('akad.index.detail.table-nasabah-akad', ['data' => $harian->data, 'dateRange' => $harian->dateRange])
                                </div>
                                <div class="tab-pane {{active_tab('tujuh_hari', request('name_tab'))}}" id="tujuh_hari" role="tabpanel">
                                    @include('akad.index.detail.table-nasabah-akad', ['data' => $tujuh->data, 'dateRange' => $tujuh->dateRange])
                                </div>
                                <div class="tab-pane {{active_tab('lima_belas_hari', request('name_tab'))}}" id="lima_belas_hari" role="tabpanel">
                                    @include('akad.index.detail.table-nasabah-akad', ['data' => $limaBelas->data, 'dateRange' => $limaBelas->dateRange])
                                </div>
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                    
                    <!-- Row end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
