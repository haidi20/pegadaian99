{{-- 'modal prosedur untuk tombol bayar b.Titip dan tombol pelunasan' --}}
<div class="modal fade" id="modal-prosedur"  tabindex="-1" aria-hidden="true" style='z-index:10000;' role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title prosedur-title">Pembayaran Biaya Titip</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="view-info">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="general-info">
                                <div class="row" id="data-detail">
                                    <div class="col-sm-12 col-md-7">
                                        <div class="">
                                            <table class="table m-0">
                                                <tbody id="table-detail-one">
                                                    <tr>
                                                        <td>Nama </td>
                                                        <td class="nama_lengkap"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jaminan </td>
                                                        <td class="nama_barang"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pinjaman </td>
                                                        <td class="nominal_nilai_pencairan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip </td>
                                                        <td class="nominal_biaya_titip"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip Terbayar </td>
                                                        <td class="bt_terbayar"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip Tertunggak </td>
                                                        <td class="bt_tertunggak"></td>
                                                    </tr>
                                                    <tr id="pelunasan">
                                                        <td>Total </td>
                                                        <td class="total"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of general info -->
                        </div>
                        <!-- end of col-lg-12 -->
                    </div>
                    <!-- end of row -->
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pl-4">
                        <a href="#" class="btn btn-sm btn-success" onClick="custom_checkbox('add')">
                            <i class="zmdi zmdi-plus"></i> Tambah
                        </a>
                        <a href="#" class="btn btn-sm btn-warning" onClick="custom_checkbox('delete')">
                            <i class="ion-minus-round"></i> Kurangi
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 pl-4">
                        <h4 id="keterangan_waktu_ke"></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 pl-5">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12 checkbox" >

                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pl-4">
                        <h5 id="keterangan_total_bt">Total B.Titip : Rp. 0 (0 minggu) </h5> <br>
                        <h5 id="keterangan_total" style="display:none">Total Pembayaran : Rp. 0 </h5>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pl-4">
                        <a href="#" class="btn btn-sm btn-info bayar" onClick="bayar()">
                            Bayar
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
    {{-- information hidden --}}
    <input type="hidden" class="id_akad">
    <input type="hidden" class="bt_7_hari">
    <input type="hidden" class="type_button">
    <input type="hidden" class="nominal_total">
    <input type="hidden" class="from_checkbox">
    <input type="hidden" class="until_checkbox">
    <input type="hidden" class="nilai_pencairan">
    <input type="hidden" class="opsi_pembayaran">
    <input type="hidden" class="default_until_checkbox">
</div>

<div class="modal fade" id="modal-lelang"  tabindex="-1" aria-hidden="true" style='z-index:10000;' role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Akad Lelang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="view-info">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="general-info">
                                <div class="row" id="data-detail">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody id="table-detail-one">
                                                    <tr>
                                                        <td>Pinjaman</td>
                                                        <td class="">: Rp.1.000.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tunggakan</td>
                                                        <td class="">: Rp.315.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Administrasi Lelang</td>
                                                        <td class="">: Rp.10.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td class="">: Rp.1.325.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of general info -->
                        </div>
                        <!-- end of col-lg-12 -->
                    </div>
                </div>
                <!-- end of view-info -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-akad-ulang"  tabindex="-1" aria-hidden="true" style='z-index:10000;' role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Akad Ulang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="view-info">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="general-info">
                                <div class="row" id="data-detail">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody id="table-detail-one" class="custom-akad-ulang">
                                                    <tr>
                                                        <td class="title-form">Data Nasabah :</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td class="data-nama_lengkap"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td class="data-jenis_kelamin"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td class="data-alamat"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota</td>
                                                        <td class="data-kota"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Telp</td>
                                                        <td class="data-no_telp"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Identitas</td>
                                                        <td class="data-jenis_id"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Identitas</td>
                                                        <td class="data-no_identitas"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td class="data-tanggal_lahir"></td>
                                                    </tr>
                                                </tbody>
                                                <tbody id="table-detail-one" class="custom-akad-ulang">
                                                    <tr>
                                                        <td class="title-form">Data Perwakilan / Wali :</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <div class="form-radio">
                                                                        <div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="jenis_kelamin" id="jk_pria" value="Pria" checked>
                                                                                <i class="helper"></i>Pria
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="jenis_kelamin" id="jk_wanita" value="Wanita">
                                                                                <i class="helper"></i>Wanita
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <textarea rows="5" cols="5" class="form-control" id="alamat" name="alamat" required></textarea>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="kota" id="kota" required>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Telp</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Identitas</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <div class="form-radio">
                                                                        <div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="jenis_id" value="KTP" id="jenis_KTP" {{checked('KTP', 'jenis_id', 'KTP')}}>
                                                                                <i class="helper"></i>KTP
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="jenis_id" value="SIM" id="jenis_SIM" {{checked('SIM', 'jenis_id', 'KTP')}}>
                                                                                <i class="helper"></i>SIM
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio radio-inline">
                                                                            <label>
                                                                                <input type="radio" name="jenis_id" value="KK" id="jenis_KK" {{checked('KK', 'jenis_id', 'KTP')}}>
                                                                                <i class="helper"></i>KK
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Identitas</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="no_identitas" id="no_identitas" required>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12 col-md-6">
                                                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="2000-01-01" >
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody id="table-detail-two" class="custom-akad-ulang" style="display:none">
                                                    <tr>
                                                        <td>NO. ID</td>
                                                        <td class="data-no_id"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jangka Waktu Akad</td>
                                                        {{-- <td class="data-jangka_waktu_akad"></td> --}}
                                                        <td>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12 col-md-6">
                                                                    <select name="jangka_waktu_akad" id="jangka_waktu_akad" class="form-control">
                                                                        @foreach($listTime as $index => $item)
                                                                            <option value="{{$item['value']}}" class="jwa_{{$item['value']}}" >
                                                                                {{$item['text']}}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Akad</td>
                                                        <td class="data-tanggal_akad"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Jatuh Tempo</td>
                                                        <td class="data-tanggal_jatuh_tempo"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Barang</td>
                                                        <td class="data-nama_barang"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Barang</td>
                                                        <td class="data-jenis_barang"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Detail Jenis Barang</td>
                                                        <td class="data-detail_jenis_barang"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="name-kelengkapan_barang_satu"></td>
                                                        <td class="data-kelengkapan_barang_satu"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="name-kelengkapan_barang_dua"></td>
                                                        <td class="data-kelengkapan_barang_dua"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="name-kelengkapan_barang_tiga"></td>
                                                        <td class="data-kelengkapan_barang_tiga"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelengkapan Barang</td>
                                                        <td>
                                                            <textarea rows="5" cols="3" class="form-control data-kelengkapan" id="kelengkapan" name="kelengkapan" disabled></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kekurangan / Kerusakan Barang</td>
                                                        <td>
                                                                <textarea rows="5" cols="3" class="form-control data-kekurangan" id="kekurangan" name="kekurangan" disabled></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Taksiran Marhun</td>
                                                        <td class="data-nilai_tafsir"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marhun Bih</td>
                                                        <td class="data-nilai_pencairan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tunggakan</td>
                                                        <td class="data-bt_tertunggak"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penyusutan Pinjaman</td>
                                                        <td>
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                                                    <input type="text" class="form-control penyusutan" name="penyusutan" id="penyusutan">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opsi Pembayaran</td>
                                                        {{-- setting show / hide use jquery  --}}
                                                        <td>
                                                            <div class="form-radio">
                                                                :
                                                                {{-- setting show / hide use jquery  --}}
                                                                @foreach($paymentOption as $index => $item)
                                                                    <div class="radio radio-inline" >
                                                                        <label>
                                                                            <input type="radio" class="op_{{$item['value']}}" name="opsi_pembayaran" onClick="opsi_pembayaran({{$item['value']}})" value="{{$item['value']}}" >
                                                                            <i class="helper"></i>{{$item['text']}}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <input type="hidden" id="nilai_opsi_pembayaran" name="nilai_opsi_pembayaran" value="1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip</td>
                                                        <td class="data-nominal_biaya_titip"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Administrasi</td>
                                                        <td class="data-biaya_admin"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Pembayaran</td>
                                                        <td class="total_pembayaran"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="btn btn-sm btn-info bayar" onClick="bayar()">
                                                                Bayar
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of general info -->
                        </div>
                        <!-- end of col-lg-12 -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-danger waves-effect" data-dismiss="modal">Keluar</button>
                <button type="button" class="btn btn-default btn-success waves-effect" >Selanjutnya</button>
            </div>
        </div>
    </div>

    <input type="hidden" class="data-margin">
    <input type="hidden" class="data-potongan">
    <input type="hidden" class="data-penyusutan">
    <input type="hidden" class="default-biaya_admin">
    <input type="hidden" class="data-opsi_pembayaran">
    <input type="hidden" class="default-bt_tertunggak">
    <input type="hidden" class="data-jangka_waktu_akad">
</div>
  

