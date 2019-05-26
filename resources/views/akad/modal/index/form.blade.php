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