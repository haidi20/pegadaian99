@extends('_layouts.default')

@section('script-bottom')
<script type="text/javascript" src="{{asset('adminty/files/assets/pages/advance-elements/swithces.js')}}"></script>

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
        var nasabah_akad = $('#nasabah_akad')
        var akad_jatuh_tempo = $('#akad_jatuh_tempo')
        var pelunasan_dan_lelang = $('#pelunasan_dan_lelang')

        if(tab == 'nasabah_akad'){
            $('#name_tab').val('nasabah_akad')
            akad_jatuh_tempo.removeClass('active')
            pelunasan_dan_lelang.removeClass('active')
        }else if(tab == 'akad_jatuh_tempo'){
            $('#name_tab').val('akad_jatuh_tempo')
            nasabah_akad.removeClass('active')
            pelunasan_dan_lelang.removeClass('active')
        }else{
            $('#name_tab').val('pelunasan_dan_lelang')
            nasabah_akad.removeClass('active')
            akad_jatuh_tempo.removeClass('active')
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
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Data Akad Nasabah</h4>
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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <div class="sub-title">
                        <h6>Pelunasan dan Lelang</h6>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-3 col-form-label" for="jenis_ajt">Jenis Pelunasan dan Lelang</label>
                        <div class="col-sm-12 col-md-9">
                            <select name="jenis_ajt" id="jenis_ajt" class="form-control form-control-success">
                                @foreach ($nameTables as $index => $item)
                                    <option value="{{$item['key']}}" {{selected($item['key'], 'jenis_pl', 'request')}}>{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xs">Proses</button>
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
                                <th>Nama Barang</th>
                                <th width="100px">Ceklis</th>
                                <th width="100px">Print</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->nama_barang}}</td>
                                        <td align="center">
                                            <div class="border-checkbox-section">
                                                <div class="border-checkbox-group border-checkbox-group-primary">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox{{$index}}" value="1">
                                                    <label class="border-checkbox-label" for="checkbox{{$index}}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-success mb-1">
                                                <i class="zmdi zmdi-print"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="11" align="center">No data available in table</td>
                                </tr>
                                @endforelse
                            </tbody>
                            {{-- <tfoot>
                            </tfoot> --}}
                        </table>
                    </div>
                    {!! $data->appends(Request::input())->render('vendor.pagination.bootstrap-4'); !!}                   
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
