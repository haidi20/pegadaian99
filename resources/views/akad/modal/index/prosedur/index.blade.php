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
                        <h5 id="keterangan_total">Total : Rp. 0 (0 minggu) </h5>
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
                <button type="button" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Oke</button>
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
                                    <div class="col-sm-12 col-md-5">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody id="table-detail-one">
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
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="table-responsive" style="">
                                            <table class="table table-akad-ulang m-0">
                                                <tbody class="table-detail-two">
                                                    <tr>
                                                        <td>NO. ID</td>
                                                        <td class="data-no_id"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jangka Waktu Akad</td>
                                                        <td class="data-jangka_waktu_akad"></td>
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
                                                        <td class="data-kelengkapan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kekurangan / Kerusakan Barang</td>
                                                        <td class="data-kekurangan"></td>
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
                                                        <td>Opsi Pembayaran</td>
                                                        {{-- setting show / hide use jquery  --}}
                                                        <td>
                                                            <div class="form-radio">
                                                                :
                                                                {{-- setting show / hide use jquery  --}}
                                                                @foreach($paymentOption as $index => $item)
                                                                    <div class="radio radio-inline" >
                                                                        <label>
                                                                            <input type="radio" class="op_{{$item['value']}}" name="opsi_pembayaran" checked value="{{$item['value']}}" >
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
                                                        <td>Biaya Titip yang Dibayar</td>
                                                        {{-- <td class="data-bt_terbayar"></td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Biaya Titip yang Dibayar</td>
                                                        {{-- <td class="data-jml_bt_yang_dibayar"></td> --}}
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Administrasi</td>
                                                        <td class="data-biaya_admin"></td>
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
                <button type="button" id="proses" onClick="process()" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Proses</button>
            </div>
        </div>
    </div>
</div>

