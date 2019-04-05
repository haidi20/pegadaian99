@extends('_layouts.default')

@section('script-bottom')
<!-- Masking js for form format number --> 
<script src="{{asset('adminty/files/assets/pages/form-masking/inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/autoNumeric.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/form-mask.js')}}"></script>
<script>
    $(document).ready(function(event) {
        $('#marhun_bih').on('keyup' ,function(){
            var data = this.value.replace(",","").replace(".","")
            $('#terbilang').val(terbilang(data));
            $('#terbilang2').val(terbilang(data));
            // console.log(data);
        });
    });
</script>
@endsection

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Akad Baru</h4>
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
 <form action="{{$action}}" method="post">
<input type="hidden" name="_method" value="post">
{{csrf_field()}}
<div class="page-body">
    <div class="row">
        <div class="col-sm-4">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Jangka Waktu Akad</h3>
                        <div class="form-radio">
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="jangka_waktu_akad" value="1" checked="{{checked('1', 'jangka_waktu_akad')}}">
                                    <i class="helper"></i>1 Hari
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="jangka_waktu_akad" value="7" checked="{{checked('7', 'jangka_waktu_akad')}}">
                                    <i class="helper"></i>7 Hari
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="jangka_waktu_akad" value="30" checked="{{checked('30', 'jangka_waktu_akad')}}">
                                    <i class="helper"></i>30 Hari
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="jangka_waktu_akad" value="60" checked="{{checked('60', 'jangka_waktu_akad')}}">
                                    <i class="helper"></i>60 hari
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Tanggal Akad</h3>
                    <div class="form-group row">
                        {{-- <label class="col-sm-2 col-form-label" for="investor">Investor</label> --}}
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="tanggal_akad" value="{{$tanggal_akad}}" disabled>
                            <input type="hidden" class="form-control" name="tanggal_akad" value="{{$tanggal_akad}}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title" for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</h3>
                    <div class="form-group row">
                        {{-- <label class="col-sm-2 col-form-label" for="investor">Investor</label> --}}
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="tanggal_jatuh_tempo" value="{{$tanggal_jatuh}}" disabled>
                            <input type="hidden" class="form-control" name="tanggal_jatuh_tempo" value="{{$tanggal_jatuh}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">No. ID</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="no_id">No. ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001" disabled>
                            <input type="hidden" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Keterangan Marhun Barang Jaminan</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="nama_barang">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{old('nama_barang')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Jenis Barang</label>
                        <div class="col-sm-10">
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_barang" value="elektronik" checked="{{checked('elektronik', 'jenis_barang')}}">
                                        <i class="helper"></i>Elektronik
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_barang" value="kendaraan" checked="{{checked('kendaran', 'jenis_barang')}}">
                                        <i class="helper"></i>Kendaraan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Kelengkapan barang</label>
                        <div class="col-sm-10">
                            <textarea rows="5" cols="5" class="form-control" id="kelengkapan" name="kelengkapan" required>{{old('kelengkapan')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Kekurangan / Kerusakan Barang</label>
                        <div class="col-sm-10">
                            <textarea rows="5" cols="5" class="form-control" id="kekurangan" name="kekurangan" required>{{old('kekurangan')}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="card">
                <div class="card-block">
                    {{-- <h3 class="sub-title">Keterangan Marhun Barang Jaminan</h3> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="taksiran_marhun">Taksiran Marhun</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="taksiran_marhun" id="taksiran_marhun" value="{{old('taksiran_marhun')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="marhun_bih">Marhun Bih</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control autonumber"  data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," id="marhun_bih" name="marhun_bih" value="{{old('marhun_bih')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-xs-2 col-form-label" for="persenan">Persenan</label>
                        <div class="col-sm-2 col-xs-2">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="text" class="form-control autonumber"  data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="persenan" id="persenan" value="{{old('persenan')}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="bt_7_hari">Biaya Titip Per 7 Hari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{old('bt_7_hari', number_format(10000))}}"  disabled>
                            <input type="hidden" class="form-control" name="bt_7_hari" id="bt_7_hari" value="{{old('bt_7_hari', 10000)}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="biaya_admin">Biaya Administrasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="biaya_admin" value="{{old('biaya_admin', number_format(10000))}}" disabled>
                            <input type="hidden" class="form-control" name="biaya_admin" id="biaya_admin" value="{{old('biaya_admin', 10000)}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="terbilang">Terbilang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="terbilang" value="{{old('terbilang')}}" disabled>
                            <input type="hidden" class="form-control" name="terbilang" id="terbilang2" value="{{old('terbilang')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Data Rahin</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="nama_lengkap">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{old('nama_lengkap')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_kelamin" value="pria" checked="{{checked('pria', 'jenis_kelamin')}}">
                                        <i class="helper"></i>Pria
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_kelamin" value="wanita" checked="{{checked('wanita', 'jenis_kelamin')}}">
                                        <i class="helper"></i>Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Alamat</label>
                        <div class="col-sm-10">
                            <textarea rows="5" cols="5" class="form-control" id="alamat" name="alamat" >{{old('alamat')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="kota">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kota" id="kota" value="{{old('kota')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="no_telp">No. Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{old('no_telp')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" >Jenis Identitas</label>
                        <div class="col-sm-10">
                            <div class="form-radio">
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_id" value="KTP" checked="{{checked('KTP', 'jenis_id')}}">
                                        <i class="helper"></i>KTP
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_id" value="SIM" checked="{{checked('SIM', 'jenis_id')}}">
                                        <i class="helper"></i>SIM
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="jenis_id" value="KK" checked="{{checked('KK', 'jenis_id')}}">
                                        <i class="helper"></i>KK
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="no_identitas">No. Identitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_identitas" id="no_identitas" value="{{old('no_identitas')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{old('tanggal_lahir', '2000-01-01')}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xs">Proses</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
