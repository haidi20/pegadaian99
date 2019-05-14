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
                url: '{{url("setting/data")}}',
                // deleteButton: false,
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
                onSuccess: function(data){
                    console.log(data)
                    if(data.coba){
                        // $('#modal-setting').modal('show');
                    }
                },
            });
        }
        function add_row()
        {
            var addRow = $('tbody tr.addRow');
            var table = document.getElementById("example-2");
            var number=(table.rows.length);
            $('.number').html(number-1);

            var addRow = '<tr>'+addRow.html()+'</tr>';

            $('tbody').append(addRow);
        };
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
                                    {{-- <th>#</th> --}}
                                    <th>Margin</th>
                                    <th>Potongan</th>
                                    <th>Jenis Barang</th>
                                    <th>Nomor Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="display:none" class="addRow">
                                    <th scope="row" style="display:none"></th>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">0</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="margin" value="0">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">0</span>
                                        <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" value="0">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Elektronik</span>
                                        <select class="tabledit-input form-control input-sm" name="jenis_barang" disabled="" style="display:none;">
                                            <option value="elektronik">Elektronik</option>
                                            <option value="kendaraan" selected>Kendaraan</option>
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
                                @forelse ($setting as $index => $item)
                                    <tr>
                                        <th scope="row" style="display:none"></th>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$item->margin}}</span>
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
                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$item->nomor_cabang}}</span>
                                            <select class="tabledit-input form-control input-sm" name="id_cabang" disabled="" style="display:none;">
                                                <option value="0">Semua</option>
                                                @foreach ($cabang as $key => $value)
                                                    <option value="{{$value->id_cabang}}" {{$value->id_cabang == $item->id_cabang ? 'selected' : ''}} > {{$value->no_cabang}} </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="tabledit-view-mode" style="display:none"><span class="tabledit-span"></span>
                                            <input class="tabledit-input form-control input-sm" type="text" name="id" value=" {{$item->id}} ">
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <th scope="row" style="display:none"></th>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">0</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="margin" value="0">
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">0</span>
                                        {{-- <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" value="0"> --}}
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Elektronik</span>
                                        <select class="tabledit-input form-control input-sm" name="jenis_barang" disabled="" style="display:none;">
                                            <option value="elektronik" selected>Elektronik</option>
                                            <option value="kendaraan">Kendaraan</option>
                                        </select>
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">{{$userCabang->nomor_cabang}}</span>
                                        <select class="tabledit-input form-control input-sm" name="nomor_cabang" disabled="" style="display:none;">
                                            <option value="0">Semua</option>
                                            @foreach ($cabang as $index => $item)
                                                <option value=" {{$item->id_cabang}} " {{$item->id_cabang == $userCabang->id_cabang ? 'selected' : ''}} > {{$item->no_cabang}} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="tabledit-view-mode" style="display:none"><span class="tabledit-span"></span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="id" value=" {{$item->id}} ">
                                    </td>
                                </tr>
                                @endforelse
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

