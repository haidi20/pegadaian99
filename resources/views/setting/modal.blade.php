<div class="modal fade" id="modal-setting"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Data Pengaturan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="sub-title">Pilih Cabang</h3>
                <form action="{{route('setting.store')}}" method="post">
                    <input type="hidden" name="_method" value="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" value=""> 
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-3 col-form-label">Margin Elektronik</label>
                        <div class="col-sm-12 col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">%</span>
                                <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="margin_elektronik" id="margin_elektronik" placeholder="Jumlah" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-sm-12 col-md-3 col-form-label">Margin Kendaraan</label>
                            <div class="col-sm-12 col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">%</span>
                                    <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="margin_kendaraan" id="margin_kendaraan" placeholder="Jumlah" required>
                                </div>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-3 col-form-label">Jumlah Potongan</label>
                        <div class="col-sm-12 col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp. </span>
                                <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="potongan" id="potongan" placeholder="Jumlah" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xs ">Proses</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success waves-effect " data-dismiss="modal">Oke</button>
            </div> --}}
        </div>
    </div>
</div>