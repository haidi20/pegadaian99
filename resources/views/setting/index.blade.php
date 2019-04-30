@extends('_layouts.default')

@section('script-bottom')
    <script>
        function create()
        {
            $('#modal-setting').modal('show')
        }
    </script>
@endsection

@section('content')
@include('setting.modal')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
             {!! session()->get('message') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Pengaturan Persenan & Jumlah Biaya Titip yang di bayar</h3>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="javascript:void(0)" onClick="create()" class="btn btn-success">Buat</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table table-striped table-bordered nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th>Jumlah Persenan</th>
                                            <th>Jumlah Biaya Titip yang Dibayar</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if(!is_null($setting))
                                                <td>{{$setting->persenan}}</td>
                                                <td>{{$setting->biaya_titip}}</td>
                                                <td align="center">
                                                    <a href="{{route('setting.edit', $setting->id)}}" title="Detail Data" class="btn btn-sm btn-info">
                                                        <i class="icofont icofont-external icofont-lg"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <tr>
                                                    <td colspan="3" align="center">No data available in table</td>
                                                </tr>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right  m-r-20">
                                {{-- <a href="#!" class="b-b-primary text-primary">View all Sales Locations </a> --}}
                            </div>
                        </div>
                    </div>   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
