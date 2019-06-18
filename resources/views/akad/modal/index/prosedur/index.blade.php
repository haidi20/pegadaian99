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
                                        {{-- <div class="table-responsive"> --}}
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
                                                        <td class="nilai_tafsir"></td>
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
                                                        <td class="pelunasan"></td>
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
                        <a href="#" class="btn btn-sm btn-success" onClick="customCheckbox('add')">
                            <i class="zmdi zmdi-plus"></i> Tambah
                        </a>
                        <a href="#" class="btn btn-sm btn-warning" onClick="customCheckbox('delete')">
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
</div>

{{-- information hidden --}}
<input type="hidden" class="bt_7_hari">
<input type="hidden" class="from_checkbox">
<input type="hidden" class="until_checkbox">
<input type="hidden" class="opsi_pembayaran">
<input type="hidden" class="default_until_checkbox">
<input type="hidden" class="nominal_total">