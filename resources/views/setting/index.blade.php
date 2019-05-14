@extends('_layouts.default')

@section('script-bottom')

    <!-- Editable-table js -->
    <script type="text/javascript" src="{{asset('adminty/files/assets/pages/edit-table/jquery.tabledit.js')}}"></script>

    <script>
        var number = 1;
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
                    $('.name_status').val('edit');

                    // if after insert data. can get id and then insert form id
                    if(data.inputan.action == 'edit'){
                        // $('#data_'+(number - 1)+' td #value_id').val(data.id)
                        $('#data_'+(number - 1)+' td #value_id').val(data.id)
                    }

                    console.log(data)
                },
            });
        }

        function add_row()
        {
            var addRow = $('tbody tr.addRow');
            var addRow = '<tr id="data_'+number+'">'+addRow.html()+'</tr>';

            $('tbody').append(addRow);
            number++;

            // var id = $('#data_'+number+' td #value_id').val(number)

            // $.ajax({
            //     url: '{{url("setting/data")}}',
            //     type: 'POST',
            //     data: {id_cabang:'0', jenis_barang:'elektronik', potongan:0, margin:0, action:'add'},
            //     cache: false,
            //     success:function(result){		
            //         console.log(result)
            //     },
            //     error:function(xhr, ajaxOptions, thrownError){
            //         console.log(thrownError)
            //     }
            // });
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
                    <button type="button" class="btn btn-primary btn-sm" onclick="add_row()">Tambah</button>
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
                                            <option value="elektronik" selected>Elektronik</option>
                                            <option value="kendaraan">Kendaraan</option>
                                        </select>
                                    </td>
                                    <td class="tabledit-view-mode"><span class="tabledit-span">Semua</span>
                                        <select class="tabledit-input form-control input-sm" name="id_cabang" disabled="" style="display:none;">
                                            <option value="0" selected>Semua</option>
                                            @foreach ($cabang as $key => $value)
                                                <option value="{{$value->id_cabang}}"> {{$value->no_cabang}} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="tabledit-view-mode" style="display:none"><span class="tabledit-span"></span>
                                        <input class="tabledit-input form-control input-sm" id="value_id" type="text" name="id" value="">
                                    </td>
                                    <td class="tabledit-view-mode" style="display:none"><span class="tabledit-span name_status">tambah</span>
                                        <input class="tabledit-input form-control input-sm name_status" type="text" name="status" value="edit">
                                    </td>
                                </tr>
                                @forelse ($setting as $index => $item)
                                    <tr>
                                        <th scope="row" style="display:none"></th>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$item->margin}}</span>
                                            {{-- <input class="tabledit-input form-control input-sm" type="text" name="margin" value="0"> --}}
                                        </td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span"> {{$item->potongan}} </span>
                                            {{-- <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" value="0"> --}}
                                        </td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span"> {{$item->jenis_barang}} </span>
                                            <select class="tabledit-input form-control input-sm" name="jenis_barang" disabled="" style="display:none;">
                                                <option value="elektronik" {{$item->jenis_barang == "elektronik" ? 'selected' : ''}}>Elektronik</option>
                                                <option value="kendaraan" {{$item->jenis_barang == "kendaraan" ? 'selected' : ''}}>Kendaraan</option>
                                            </select>
                                        </td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">{{$item->nomor_cabang}}</span>
                                            <select class="tabledit-input form-control input-sm" name="id_cabang" disabled="" style="display:none;">
                                                <option value="0" {{$item->id_cabang == 0 ? 'selected' : ''}}>Semua</option>
                                                @foreach ($cabang as $key => $value)
                                                    <option value="{{$value->id_cabang}}" {{$value->id_cabang == $item->id_cabang ? 'selected' : ''}} > {{$value->no_cabang}} </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="tabledit-view-mode" style="display:none"><span class="tabledit-span"></span>
                                            <input class="tabledit-input form-control input-sm" type="text" name="id" value=" {{$item->id}} ">
                                        </td>
                                        <td class="tabledit-view-mode" style="display:none"><span class="tabledit-span name_status">edit</span>
                                            <input class="tabledit-input form-control input-sm name_status" type="text" name="status" value="edit">
                                        </td>
                                    </tr>
                                @empty
                                    {{-- <tr>
                                        <th scope="row" style="display:none"></th>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">0</span>
                                        </td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">0</span>
                                        </td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">Elektronik</span>
                                            <select class="tabledit-input form-control input-sm" name="jenis_barang" disabled="" style="display:none;">
                                                <option value="elektronik" selected>Elektronik</option>
                                                <option value="kendaraan">Kendaraan</option>
                                            </select>
                                        </td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">Semua</span>
                                            <select class="tabledit-input form-control input-sm" name="nomor_cabang" disabled="" style="display:none;">
                                                <option value="0" selected>Semua</option>
                                                @foreach ($cabang as $index => $item)
                                                    <option value="{{$item->id_cabang}}" > {{$item->no_cabang}} </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="tabledit-view-mode" style="display:none"><span class="tabledit-span"></span>
                                            <input class="tabledit-input form-control input-sm" type="text" name="id" value="">
                                        </td>
                                    </tr> --}}
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

