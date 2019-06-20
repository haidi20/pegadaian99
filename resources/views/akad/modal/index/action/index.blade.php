<div class="modal fade" id="modal-edit"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title edit title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nama_lengkap">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="no_telp">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_telp" id="no_telp" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="nama_barang">Jaminan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="jumlah">Pinjaman</label>
                    <div class="col-sm-8 col-lg-10">
                        <div class="input-group">
                            <span class="input-group-addon" id="">Rp.</span>
                            <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="pinjaman" id="pinjaman" placeholder="pinjaman">
                        </div>
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
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-maintenance" role="tab">maintenance</a>
                    </li>
                </ul>
                <div class="tab-content modal-body">
                    <div class="tab-pane active" id="tab-home" role="tabpanel">
                        {{-- <h6>Detail Nasabah</h6> --}}
                        @include('akad.modal.index.action.detail.detail-nasabah')
                    </div>
                    <div class="tab-pane" id="tab-profile" role="tabpanel">
                        {{-- <h6>Data Akad</h6> --}}
                        @include('akad.modal.index.action.detail.data-akad')
                    </div>
                    <div class="tab-pane" id="tab-messages" role="tabpanel">
                        {{-- <h6>Bea Titip</h6> --}}
                        @include('akad.modal.index.action.detail.biaya-titip')
                    </div>
                    <div class="tab-pane" id="tab-settings" role="tabpanel">
                        {{-- <h6>Rincian Akad</h6> --}}
                        @include('akad.modal.index.action.detail.rincian-akad')
                    </div>
                    <div class="tab-pane" id="tab-maintenance" role="tabpanel">
                        {{-- <h6>Rincian Akad</h6> --}}
                        @include('akad.modal.index.action.detail.maintenance')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>