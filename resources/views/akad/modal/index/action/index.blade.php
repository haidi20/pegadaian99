<div class="modal fade" id="modal-edit"  tabindex="-1" aria-hidden="true" style='z-index:10000;' role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title edit title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-akad">
                    <input type="hidden" class="id_akad" name="id_akad">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="nama_lengkap">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control nama_lengkap" name="nama_lengkap" id="nama_lengkap" disabled>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="no_telp">No. Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control no_telp" name="no_telp" id="no_telp" >
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="nama_barang">Jaminan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control nama_barang" name="nama_barang" id="nama_barang" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="jumlah">Pinjaman</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="">Rp.</span>
                                <input type="text" class="form-control autonumber nilai_pencairan" value="0" name="nilai_pencairan">
                            </div>
                        </div>
                    </div>
                </form>
                <button type="submit" class="btn btn-success btn-xs" onClick="send_edit_akad()">Proses</button>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-default btn-info waves-effect " data-dismiss="modal">Keluar</button> --}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-flex" id="modal-review" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rician Nasabah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="close_all_modal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <h6>Detail Nasabah</h6> --}}
                @include('akad.modal.index.action.detail.detail-nasabah')
            </div>
            <div class="modal-header">
                <h4 class="modal-title">Data Akad</h4>
            </div>
            <div class="modal-body">
               {{-- <h6>Data Akad</h6> --}}
               @include('akad.modal.index.action.detail.data-akad')
            </div>
            <div class="modal-header">
                <h4 class="modal-title">Bea Titip</h4>
            </div>
            <div class="modal-body">
                {{-- <h6>Bea Titip</h6> --}}
                @include('akad.modal.index.action.detail.biaya-titip')
            </div>
            <div class="modal-header">
                <h4 class="modal-title">Rincian Akad</h4>
            </div>
            <div class="modal-body">
                {{-- <h6>Rincian Akad</h6> --}}
                @include('akad.modal.index.action.detail.maintenance')
            </div>
        </div>
    </div>
</div>