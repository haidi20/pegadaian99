@extends('_layouts.default')

@section('script-bottom')

    <!-- Editable-table js -->
    <script type="text/javascript" src="{{asset('adminty/files/assets/pages/edit-table/jquery.tabledit.js')}}"></script>

    <script src="{{asset('adminty/files/assets/pages/form-masking/inputmask.js')}}"></script>
    <script src="{{asset('adminty/files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
    <script src="{{asset('adminty/files/assets/pages/form-masking/autoNumeric.js')}}"></script>
    <script src="{{asset('adminty/files/assets/pages/form-masking/form-mask.js')}}"></script>

    <script>
        $(document).ready(function() { 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': laravel.csrfToken
                }
            });

            custom_table_edit()
        });

        function create()
        {
            $('#modal-setting').modal('show')
        }

        function edit(id)
        {
            // get value 
            var id = $('#table_id').val()
            var margin_elektronik = $('#table_margin_elektronik').val()
            var margin_kendaraan = $('#table_margin_kendaraan').val()
            var potongan = $('#table_potongan').val()

            $('#id').val(id)
            $('#margin_elektronik').val(margin_elektronik)
            $('#margin_kendaraan').val(margin_kendaraan)
            $('#potongan').val(potongan)

            $('#modal-setting').modal('show')
        }

        function custom_table_edit()
        {
            $('#example-2').Tabledit({
                url: '{{url("setting/coba")}}',
                deleteButton: false,
                buttons:{
                    edit: {
                        class: 'btn btn-sm btn-info',
                        html: '<span class="fa fa-pencil"></span>',
                        action: 'edit'
                    },
                    save: {
                        class: 'btn btn-sm btn-success',
                        html: 'Save',
                        action: 'save'
                    },
                },
                columns: {
                    identifier: [0, 'id'],
                    editable: [[1, 'potongan'], [2, 'margin']]
                },
                ajaxOptions: {
                    dataType: 'JSON',
                    type: 'GET'
                },
                // display: function(value, response) {
                //     console.log(response.coba);
                //     // new_value being the value that is returned via the json response...
                //     // this value can either be modified here in the javascript or in the controller which set the value...
                // },
                // error: function(response, newValue) {
                //     if(response.status === 500) {
                //         console.log('Service unavailable. Please try later.');
                //     } else {
                //         console.log(response.responseText);
                //     }
                // },
                success: function(response, status, xhr) {
                    console.log(response, status, xhr);
                },
            });
        }
    </script>
@endsection

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
             {!! session()->get('message') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <!-- Edit With Click card end -->
            <!-- Edit With Button card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Pengaturan Margin</h5>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example-2">
                            <thead>
                                <tr>
                                    <th>Jenis Barang</th>
                                    <th>Potongan</th>
                                    <th>Margin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Elektronik</th>
                                    <td class="tabledit-view-mode">
                                        <span class="tabledit-span">10%</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="elektronik_potongan" value="0">
                                    </td>
                                    <td class="tabledit-view-mode">
                                        <span class="tabledit-span">10.000</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="elektronik_margin" value="0">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Kendaraan</th>
                                    <td class="tabledit-view-mode">
                                        <span class="tabledit-span">10%</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="elektronik_potongan" value="0">
                                    </td>
                                    <td class="tabledit-view-mode">
                                        <span class="tabledit-span">10.000</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="elektronik_margin" value="0">
                                    </td>
                                    {{-- <td class="tabledit-view-mode"><span class="tabledit-span">@mdo</span>
                                        <select class="tabledit-input form-control input-sm" name="Nickname" disabled="" style="display:none;">
                                            <option value="1">@mdo</option>
                                            <option value="2">@fat</option>
                                            <option value="3">@twitter</option>
                                        </select>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Edit With Button card end -->
        </div>
    </div>
</div>
@endsection

@section('contentt')
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
                            <a href="javascript:void(0)" onClick="create()" class="btn btn-success {{$setting ? 'disabled' : ''}}">Buat</a>
                            {{-- <a href="javascript:void(0)" onClick="create()" class="btn btn-success ">Buat</a> --}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table table-striped table-bordered nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th>Potongan</th>
                                            <th>Margin Elektronik</th>
                                            <th>Margin Kendaraan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if(!is_null($setting))
                                                <td>{{$setting->nominal_potongan}}</td>
                                                <td>{{$setting->margin_elektronik}}%</td>
                                                <td>{{$setting->margin_kendaraan}}%</td>
                                                <td align="center">
                                                    <a href="javascript:void(0)" onClick="edit({{$setting->id}})" title="Detail Data" class="btn btn-sm btn-info">
                                                        <i class="icofont icofont-external icofont-lg"></i>
                                                    </a>
                                                </td>

                                                <input type="hidden" id="table_id" value="{{$setting->id}}">
                                                <input type="hidden" id="table_margin_elektronik" value="{{$setting->margin_elektronik}}">
                                                <input type="hidden" id="table_margin_kendaraan" value="{{$setting->margin_kendaraan}}">
                                                <input type="hidden" id="table_potongan" value="{{$setting->potongan}}">
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
