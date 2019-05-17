<div class="modal fade" id="modal-akad-notif"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pengingat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Apakah Anda Yakin Data Sudah Sesuai ? </h5>
            </div>
            
            <div class="modal-footer">
                <button type="button" id="tidak" class="btn btn-default btn-danger waves-effect " data-dismiss="modal">tidak</button>
                <button type="button" id="iya" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Iya</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-akad-confirm"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Data</h4>
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
                                    <div class="col-sm-12 col-md-6">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody id="table-detail-one">
                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td id="data-nama_lengkap"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td id="data-jenis_kelamin"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td id="data-alamat"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kota</td>
                                                        <td id="data-kota"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Telp</td>
                                                        <td id="data-no_telp"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Identitas</td>
                                                        <td id="data-jenis_id"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No. Identitas</td>
                                                        <td id="data-no_identitas"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td id="data-tanggal_lahir"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="table-responsive">
                                            <table class="table m-0" >
                                                <tbody id="table-detail-two">
                                                    <tr>
                                                        <td>NO. ID</td>
                                                        <td id="data-no_id"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jangka Waktu Akad</td>
                                                        <td id="data-jangka_waktu_akad"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Akad</td>
                                                        <td id="data-tanggal_akad"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Jatuh Tempo</td>
                                                        <td id="data-tanggal_jatuh_tempo"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Barang</td>
                                                        <td id="data-nama_barang"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Barang</td>
                                                        <td id="data-jenis_barang"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="name-kelengkapan_barang_satu"></td>
                                                        <td id="data-kelengkapan_barang_satu"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="name-kelengkapan_barang_dua"></td>
                                                        <td id="data-kelengkapan_barang_dua"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="name-kelengkapan_barang_tiga"></td>
                                                        <td id="data-kelengkapan_barang_tiga"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelengkapan Barang</td>
                                                        <td id="data-kelengkapan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kekurangan / Kerusakan Barang</td>
                                                        <td id="data-kekurangan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Taksiran Marhun</td>
                                                        <td id="data-taksiran_marhun"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marhun Bih</td>
                                                        <td id="data-marhun_bih"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Opsi Pembayaran</td>
                                                        <td id="data-nilai_opsi_pembayaran"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip</td>
                                                        <td id="data-biaya_titip"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip yang Dibayar</td>
                                                        <td id="data-bt_yang_dibayar"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Biaya Titip yang Dibayar</td>
                                                        <td id="data-jml_bt_yang_dibayar"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Administrasi</td>
                                                        <td id="data-biaya_admin"></td>
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