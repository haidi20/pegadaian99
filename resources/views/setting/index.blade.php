@extends('_layouts.default')

@section('script-bottom')

    <!-- Editable-table js -->
    <script type="text/javascript" src="{{asset('adminty/files/assets/pages/edit-table/jquery.tabledit.js')}}"></script>

    <script>

        $(document).ready(function() { 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': laravel.csrfToken
                }
            });

            potongan_keyup();

            custom_table_edit();
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

        function potongan_keyup()
        {
            $('body').on("keyup", "input[name=potongan]", function() {
                this.value = formatRupiah(this.value)
            });
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
                    editable: [[1, 'margin'], [2, 'potongan']]
                },
                ajaxOptions: {
                    dataType: 'JSON',
                    type: 'POST'
                },
                onSuccess: function(data) {
                    console.log(data)
                },
            });
        }
        function add_row()
        {
            var table = document.getElementById("example-2");
            var t1=(table.rows.length);
            var row = table.insertRow(t1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);

            cell1.className='abc';

            $('<th scope="row">1</th>').appendTo(cell1);
            $('<th scope="row">inputan</th>').appendTo(cell2);

        };
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="add_row()">Add Row </button>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="example-2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Margin</th>
                                    <th>Potongan</th>
                                    <th>Jenis Barang</th>
                                    <th>Nomor Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">10</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="margin" value="0">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">10.000</span>
                                        {{-- <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" value="0"> --}}
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Elektronik</span>
                                        <select class="tabledit-input form-control input-sm" name="jenis_barang" disabled="" style="display:none;">
                                            <option value="elektronik" selected>Elektronik</option>
                                            <option value="kendaraan">Kendaraan</option>
                                        </select>
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">01</span>
                                        <select class="tabledit-input form-control input-sm" name="nomor_cabang" disabled="" style="display:none;">
                                            <option value="01" selected>01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">10</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="margin" value="0">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">50.000</span>
                                        <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" value="0">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Kendaraan</span>
                                        <select class="tabledit-input form-control input-sm" name="jenis_barang" disabled="" style="display:none;">
                                            <option value="elektronik">Elektronik</option>
                                            <option value="kendaraan" selected>Kendaraan</option>
                                        </select>
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">02</span>
                                        <select class="tabledit-input form-control input-sm" name="nomor_cabang" disabled="" style="display:none;">
                                            <option value="01">01</option>
                                            <option value="02" selected>02</option>
                                            <option value="03">03</option>
                                        </select>
                                    </td>
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
