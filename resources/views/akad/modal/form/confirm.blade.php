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
                                    <div class="col-sm-12 col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody id="table-detail-one">
                                                    <tr>
                                                        <td>NO. ID</td>
                                                        <td id="data-no_id"></td>
                                                        <td>Jangka Waktu Akad</td>
                                                        <td id="data-jangka_waktu_akad"></td>
                                                        <td>Tanggal Akad</td>
                                                        <td id="data-tanggal_akad"></td>
                                                        <td>Tanggal Jatuh Tempo</td>
                                                        <td id="data-tanggal_jatuh_tempo"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-5">
                                        <div class="table-responsive">
                                            <table class="table m-0" >
                                                <tbody id="table-detail-two">
                                                   {{-- fetch data from jquery --}}
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
                <!-- end of view-info -->
            </div>
            <div class="modal-footer">
                <button type="button" id="proses" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Proses</button>
            </div>
        </div>
    </div>
</div>