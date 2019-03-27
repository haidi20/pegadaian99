@extends('_layouts.default')

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
<div class="page-body">
    <div class="row">
        <div class="col-sm-4">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Jangka Waktu Akad</h3>
                    <form action="#" method="post">
                        <input type="hidden" name="_method" value="post">
                        {{csrf_field()}}
                        <div class="form-radio">
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="radio" checked="checked">
                                    <i class="helper"></i>1 Hari
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="radio" checked="checked">
                                    <i class="helper"></i>7 Hari
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="radio" checked="checked">
                                    <i class="helper"></i>30 Hari
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="radio">
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
                            <input type="date" class="form-control" name="tanggal_akad" id="tanggal_akad">
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
                            <input type="date" class="form-control" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo">
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
                                        <input type="radio" name="radio" checked="">
                                        <i class="helper"></i>Elektronik
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <label>
                                        <input type="radio" name="radio" checked="checked">
                                        <i class="helper"></i>Kendaraan
                                    </label>
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
