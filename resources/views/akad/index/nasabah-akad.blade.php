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
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ready(function() {
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
            $('#name_tab').val(tab)
            if(tab != dataTabs[i]){
                $('#'+dataTabs[i]).removeClass('active');
            }
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
                                    <a class="nav-link active {{active_tab('seluruh_data', request('name_tab'))}}" 
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
                            <form method="get">
                            <input type="hidden" id="name_tab" name="name_tab" value="{{request('name_tab')}}">
                            <div class="tab-content tabs card-block">
                                <div class="tab-pane active{{active_tab('seluruh_data', request('name_tab'))}}" id="seluruh_data" role="tabpanel">
                                    <div class="table-responsive dt-responsive">
                                        <table class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    @foreach($column as $index => $item)
                                                        <th>{{$item}}</th>
                                                    @endforeach
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($data as $index => $item)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>{{$item->nama_lengkap}}</td>
                                                        <td>{{$item->no_telp}}</td>
                                                        <td>{{$item->no_id}}</td>
                                                        <td>{{$item->nama_barang}}</td>
                                                        <td>{{$item->nominal_nilai_tafsir}}</td>
                                                        <td>{{$item->terbilang_tunggakan}}</td>
                                                        <td>{{$item->tanggal_akad}}</td>
                                                        <td>{{$item->tanggal_jatuh_tempo}}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-mini btn-primary" onClick="prosedur('bt')">
                                                                Bayar B. Titip
                                                            </a>
                                                            <a href="#" class="btn btn-mini btn-success" onClick="prosedur('pelunasan')">
                                                                Pelunasan
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-mini btn-info" onClick="review()">
                                                                <i class="zmdi zmdi-search"></i>
                                                            </a>
                                                            <button 
                                                                type="button" 
                                                                class="btn btn-success btn-mini waves-effect waves-light" 
                                                                data-toggle="popover" 
                                                                data-placement="left" 
                                                                title="Print Menu"
                                                                data-popover-content="#a2">
                                                                <i class="zmdi zmdi-print"></i>
                                                            </button>
                                                            {{-- for menu-mini button print --}}
                                                            <div id="a2" style="display:none">
                                                                <div class="popover-heading"></div>
                                                                <div class="popover-body">
                                                                    <a href="javascript:void(0)" class="btn btn-mini btn-success mb-1">
                                                                        <i class="zmdi zmdi-print"></i> Surat Akad
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-mini btn-success mb-1">
                                                                        <i class="zmdi zmdi-print"></i> Kwitansi Akad
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-mini btn-success" onClick="review()">
                                                                        <i class="zmdi zmdi-search"></i> Kwitansi Biaya Titip
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <a href="javascript:void(0)" onClick="edit({{$item->id_akad}})" class="btn btn-mini btn-primary">
                                                                <i class="icofont icofont-edit icofont-sm"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="11" align="center">No data available in table</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane {{active_tab('harian', request('name_tab'))}}" id="harian" role="tabpanel">
                                    harian
                                </div>
                            </div>
                            </form>
                        </div>
                        {{-- <div class="col-sm-12 col-md-4">
                            <div class="sub-title"></div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active {{active_tab('ringkasan_harian', request('name_tab'))}}" 
                                        data-toggle="tab" 
                                        href="#ringkasan_harian" 
                                        onClick="removeActive('ringkasan_harian')" 
                                        role="tab">
                                            Ringkasan Harian
                                    </a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <form method="get">
                            <input type="hidden" id="name_tab" name="name_tab" value="{{request('name_tab')}}">
                            <div class="tab-content card-block">
                                <div class="tab-pane {{active_tab('nasabah_akad', request('name_tab'))}}" id="nasabah_akad" role="tabpanel">
                                    
                                </div>
                            </div>
                            </form>
                        </div> --}}
                    </div>
                    
                    <!-- Row end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
