<div class="modal fade" id="modal-prosedur-na"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pembayaran Biaya Titip</h4>
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
                                                        <td>: data</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jaminan </td>
                                                        <td>: data</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pinjaman </td>
                                                        <td>: data</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip </td>
                                                        <td>: data</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip Terbayar </td>
                                                        <td>: data</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biaya Titip Tertunggak </td>
                                                        <td>: data</td>
                                                    </tr>
                                                    <tr id="pelunasan">
                                                        <td>Total </td>
                                                        <td>: Data</td>
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
                        <a href="#" class="btn btn-sm btn-success">
                            <i class="zmdi zmdi-plus"></i> Tambah
                        </a>
                        <a href="#" class="btn btn-sm btn-warning">
                            <i class="ion-minus-round"></i> Kurangi
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pl-4">
                        <h4>Pembayaran Minggu Ke:</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pl-5">
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <div class="checkbox-color checkbox-success">
                                    <input id="checkbox13" type="checkbox" >
                                    <label for="checkbox13">
                                        1
                                    </label>
                                </div>
                                <div class="checkbox-color checkbox-success">
                                    <input id="checkbox14" type="checkbox" >
                                    <label for="checkbox14">
                                        2
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pl-4">
                        <h5>Total : Rp. 0 (0 minggu)</h5>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-6 pl-4">
                        <a href="#" class="btn btn-sm btn-info">
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

<!-- Modal -->
<div class="modal fade modal-flex" id="modal-review-na" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-home" role="tab">Detail Nasabah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-profile" role="tab">Data Akad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-messages" role="tab">Bea Titip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-settings" role="tab">Rincian Akad</a>
                    </li>
                </ul>
                <div class="tab-content modal-body">
                    <div class="tab-pane active" id="tab-home" role="tabpanel">
                        {{-- <h6>Detail Nasabah</h6> --}}
                        @include('akad.modal.detail-prosedur.detail-nasabah')
                    </div>
                    <div class="tab-pane" id="tab-profile" role="tabpanel">
                        {{-- <h6>Data Akad</h6> --}}
                        @include('akad.modal.detail-prosedur.data-akad')
                    </div>
                    <div class="tab-pane" id="tab-messages" role="tabpanel">
                        {{-- <h6>Bea Titip</h6> --}}
                        @include('akad.modal.detail-prosedur.biaya-titip')
                    </div>
                    <div class="tab-pane" id="tab-settings" role="tabpanel">
                        {{-- <h6>Rincian Akad</h6> --}}
                        @include('akad.modal.detail-prosedur.rincian-akad')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>