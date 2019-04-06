@extends('_layouts.default')

@section('script-bottom')
<!-- Masking js for form format number --> 
<script src="{{asset('adminty/files/assets/pages/form-masking/inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/autoNumeric.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/form-mask.js')}}"></script>
@endsection

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
                                <input value="{{old('investor')}}" type="text" class="form-control" name="investor" id="investor"required>
                            </div>
                        </div>
                        @if($method == 'POST')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="modal_awal">Modal Awal</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                    <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="modal_awal" id="modal_awal" value="{{old('modal_awal')}}" required>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="no_cabang">No. Cabang</label>
                            <div class="col-sm-10">
                                <input value="{{old('no_cabang')}}" type="text" class="form-control" name="no_cabang" id="no_cabang"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama_cabang">Nama Cabang</label>
                            <div class="col-sm-10">
                                <input value="{{old('nama_cabang')}}" type="text" class="form-control" name="nama_cabang" id="nama_cabang"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="telp_cabang">No. Telp</label>
                            <div class="col-sm-10">
                                <input value="{{old('telp_cabang')}}" type="text" class="form-control" name="telp_cabang" id="telp_cabang"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="alamat_cabang">Alamat Cabang</label>
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" class="form-control" id="alamat_cabang" name="alamat_cabang" required>{{old('alamat_cabang')}}</textarea>
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
