@extends('_layouts.default')

@section('script-bottom')
    <script>
        var number = 1;

        $(function(){
            potongan_keyup();
        });

        function add_row()
        {
            var addRow = $('tbody tr.addRow');
            var addRow = '<tr id="row_'+number+'">'+addRow.html()+'</tr>';

            $('tbody').append(addRow);

            $('#row_'+number).find('td:nth-child(6) a:nth-child(1)').attr('onClick', 'action("add", "'+number+'")');
            $('#row_'+number).find('td:nth-child(6) a:nth-child(2)').attr('onClick', 'action("delete", "'+number+'")');
            $('#row_'+number).find('td:nth-child(6) a:nth-child(3)').attr('onClick', 'send("add", "'+number+'")');
            $('#row_'+number).find('td:nth-child(6) a:nth-child(4)').attr('onClick', 'send("delete", "'+number+'")');

            // console.log($('#row_'+number).find('td:nth-child(6)').html())

            number++;
        }

        function action(status, id = null, url = null)
        {
            // show / hide span, input, select
            $('#row_'+id+' td span').toggle();
            $('#row_'+id+' td input').toggle();
            $('#row_'+id+' td select').toggle();

            if(status == 'edit' || status == 'add'){
                $('#row_'+id+' td:nth-child(6) a:nth-child(3)').toggle();
                $('#row_'+id+' td:nth-child(6) a:nth-child(4)').hide();
            }else{
                $('#row_'+id+' td:nth-child(6) a:nth-child(3)').hide();
                $('#row_'+id+' td:nth-child(6) a:nth-child(4)').toggle();
            }
        }

        function send(status, id = null, url = null)
        {
            var margin          = $('#row_'+id+' td:nth-child(1) input').val();
            var potongan        = $('#row_'+id+' td:nth-child(2) input').val();
            var value_id        = $('#row_'+id+' td:nth-child(5) input').val();
            var id_cabang       = $('#row_'+id+' td:nth-child(4) select').val();
            var jenis_barang    = $('#row_'+id+' td:nth-child(3) select').val();

            // console.log(id)

            $.ajax({
                url: '{{url("setting/validate-data")}}',
                type: 'GET',
                data: {
                        margin:margin, 
                        status: status,
                        value_id:value_id, 
                        potongan:potongan, 
                        id_cabang:id_cabang, 
                        jenis_barang:jenis_barang, 
                    },
                cache: false,
                success:function(result){		
                    console.log(result)

                    if(result.message){
                        $('#modal-setting').modal('show')
                        $('#message').html(result.message)
                    }else{
                        if(result.inputan.status == 'add'){
                            var url = '{{route("setting.store")}}';
                        }else if(result.inputan.status == 'edit'){
                            var value_id = result.inputan.value_id;
                            var url = '{{route("setting.update", '+value_id+')}}';
                        }else if(result.inputan.status == 'delete'){
                            var value_id = result.inputan.value_id;
                            var url = '{{route("setting.delete", '+value_id+')}}';
                        }

                        // console.log(result);

                        $.redirect(url, {
                            data: result.inputan
                        }, "GET");
                    }
                },
                error:function(xhr, ajaxOptions, thrownError){
                    console.log(thrownError)
                }
            });
        }

        function potongan_keyup()
        {
            $('body').on("keyup", "input[name=potongan]", function() {
                this.value = formatRupiah(this.value)
            });
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="display:none" class="addRow">
                                    <td><span class="tabledit-span">0</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="margin" style="display:none;" value="0">
                                    </td>
                                    <td><span class="tabledit-span">0</span>
                                        <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" style="display:none;" value="0">
                                    </td>
                                    <td><span class="tabledit-span">elektronik</span>
                                        <select class="tabledit-input form-control input-sm" name="jenis_barang" style="display:none;">
                                            <option value="elektronik">elektronik</option>
                                            <option value="kendaraan">kendaraan</option>
                                        </select>
                                    </td>
                                    <td><span class="tabledit-span">semua</span>
                                        <select class="tabledit-input form-control input-sm" name="id_cabang" style="display:none;">
                                            <option value="0">Semua</option>
                                            @foreach ($cabang as $key => $value)
                                                <option value="{{$value->id_cabang}}"> {{$value->no_cabang}} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="display:none"><span class="tabledit-span" ></span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="id" style="display:none;" value="0">
                                    </td>
                                    <td align="center">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary" title="Edit Data">
                                            <i class="icofont icofont-edit icofont-sm"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Delete Data">
                                            <i class="icofont icofont-ui-delete icofont-sm"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-success" style="display:none" title="Delete Data">
                                            Save
                                        </a>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="display:none" title="Delete Data">
                                            Confirm
                                        </a>
                                    </td>
                                </tr>
                                @forelse ($setting as $index => $item)
                                    <tr id="row_{{$item->id}}">
                                        <td><span class="tabledit-span">{{$item->margin}}</span>
                                            <input class="tabledit-input form-control input-sm" type="text" name="margin" style="display:none;" value="{{$item->margin}}">
                                        </td>
                                        <td><span class="tabledit-span"> Rp. {{$item->nominal_potongan}} </span>
                                            <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" style="display:none;" value="{{$item->potongan}}">
                                        </td>
                                        <td><span class="tabledit-span"> {{$item->jenis_barang}} </span>
                                            <select class="tabledit-input form-control input-sm" name="jenis_barang" style="display:none;">
                                                <option value="elektronik" {{$item->jenis_barang == "elektronik" ? 'selected' : ''}}>elektronik</option>
                                                <option value="kendaraan" {{$item->jenis_barang == "kendaraan" ? 'selected' : ''}}>kendaraan</option>
                                            </select>
                                        </td>
                                        <td><span class="tabledit-span">{{$item->nomor_cabang}}</span>
                                            <select class="tabledit-input form-control input-sm" name="id_cabang" style="display:none;">
                                                <option value="0" {{$item->id_cabang == 0 ? 'selected' : ''}}>Semua</option>
                                                @foreach ($cabang as $key => $value)
                                                    <option value="{{$value->id_cabang}}" {{$value->id_cabang == $item->id_cabang ? 'selected' : ''}} > {{$value->no_cabang}} </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="display:none"><span class="tabledit-span" style="display:none"></span>
                                            <input class="tabledit-input form-control input-sm" type="text" name="id" style="display:none;" value="{{$item->id}}">
                                        </td>
                                        <td align="center">
                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onClick="action('edit', {{$item->id}}, '{{route('setting.update', $item->id)}}')" title="Edit Data">
                                                <i class="icofont icofont-edit icofont-sm"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-danger" onClick="action('delete', {{$item->id}}, '{{route('setting.delete', $item->id)}}')" title="Delete Data">
                                                <i class="icofont icofont-ui-delete icofont-sm"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-success" style="display:none" onClick="send('edit', {{$item->id}}, '{{route('setting.delete', $item->id)}}')" title="Delete Data">
                                                Save
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-danger" style="display:none" onClick="send('delete', {{$item->id}}, '{{route('setting.delete', $item->id)}}')" title="Delete Data">
                                                Confirm
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" align="center">No data available in table</td>
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

