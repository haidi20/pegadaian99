@extends('_layouts.default')

@section('script-bottom')

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
                                    <th scope="row" style="display:none"></th>
                                    <td><span class="tabledit-span">0</span>
                                        <input class="tabledit-input form-control input-sm" type="text" name="margin" value="0">
                                    </td>
                                    <td><span class="tabledit-span">0</span>
                                        <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" value="0">
                                    </td>
                                    <td><span class="tabledit-span">elektronik</span>
                                        <select class="tabledit-input form-control input-sm" name="jenis_barang" style="display:none;">
                                            {{-- <option value="elektronik" selected>elektronik</option>
                                            <option value="kendaraan">kendaraan</option> --}}
                                        </select>
                                    </td>
                                    <td><span class="tabledit-span">Semua</span>
                                        <select class="tabledit-input form-control input-sm" name="id_cabang" style="display:none;">
                                            {{-- <option value="0" selected>Semua</option> --}}
                                            {{-- @foreach ($cabang as $key => $value)
                                                <option value="{{$value->id_cabang}}"> {{$value->no_cabang}} </option>
                                            @endforeach --}}
                                        </select>
                                    </td>
                                    <td style="display:none"><span class="tabledit-span"></span>
                                        <input class="tabledit-input form-control input-sm" id="value_id" type="text" name="value_id" value="">
                                    </td>
                                    <td style="display:none"><span class="tabledit-span"></span><input class="tabledit-input form-control input-sm" type="text" id="clone_id" name="clone_id" value="clone">
                                    </td>
                                    <td style="display:none"><span class="tabledit-span name_status">tambah</span>
                                        <input class="tabledit-input form-control input-sm name_status" type="text" name="status" value="edit">
                                    </td>
                                </tr>
                                @forelse ($setting as $index => $item)
                                    <form id="form_{{$item->id}}">
                                        <tr>
                                            <th scope="row" style="display:none"></th>
                                            <td><span class="tabledit-span">{{$item->margin}}</span>
                                                <input class="tabledit-input form-control input-sm" type="text" name="margin" style="display:none;" value="{{$item->margin}}">
                                            </td>
                                            <td><span class="tabledit-span"> {{$item->potongan}} </span>
                                                <input class="tabledit-input form-control input-sm potongan" type="text" name="potongan" style="display:none;" value="{{$item->potongan}}">
                                            </td>
                                            <td><span class="tabledit-span"> {{$item->jenis_barang}} </span>
                                                <select class="tabledit-input form-control input-sm" name="jenis_barang" style="display:none;">
                                                    <option value="elektronik" {{$item->jenis_barang == "elektronik" ? 'selected' : ''}}>Elektronik</option>
                                                    <option value="kendaraan" {{$item->jenis_barang == "kendaraan" ? 'selected' : ''}}>Kendaraan</option>
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
                                            <td align="center">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-primary" onClick="edit('{{route('setting.update', $item->id)}}', {{$item->id}})" title="Edit Data">
                                                    {{-- <i class="icofont icofont-ui-delete icofont-lg"></i> --}}
                                                    <i class="icofont icofont-edit icofont-sm"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-danger" onClick="delete('{{route('setting.delete', $item->id)}}', {{$item->id}})" title="Delete Data">
                                                    <i class="icofont icofont-ui-delete icofont-sm"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
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

