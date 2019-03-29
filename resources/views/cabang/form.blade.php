@extends('_layouts.default')

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Data Cabang</h3>
                    <form action="{{$action}}" method="post">
                        <input type="hidden" name="_method" value="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="investor">Investor</label>
                            <div class="col-sm-10">
                                <input value="{{old('investor')}}" type="text" class="form-control" name="investor" id="investor">
                            </div>
                        </div>
                        @if($method == 'post')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="modal_awal">Modal Awal</label>
                            <div class="col-sm-10">
                                <input value="{{old('modal_awal')}}" type="text" class="form-control" name="modal_awal" id="modal_awal">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="no_cabang">No. Cabang</label>
                            <div class="col-sm-10">
                                <input value="{{old('no_cabang')}}" type="text" class="form-control" name="no_cabang" id="no_cabang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_cabang">Nama Cabang</label>
                            <div class="col-sm-10">
                                <input value="{{old('nama_cabang')}}" type="text" class="form-control" name="nama_cabang" id="nama_cabang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="telp_cabang">No. Telp</label>
                            <div class="col-sm-10">
                                <input value="{{old('telp_cabang')}}" type="text" class="form-control" name="telp_cabang" id="telp_cabang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="alamat_cabang">Alamat Cabang</label>
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" class="form-control" id="alamat_cabang" name="alamat_cabang" >{{old('alamat_cabang')}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-xs">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
