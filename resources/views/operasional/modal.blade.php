<div class="modal fade" id="modal-add"  tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hutang Kas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('operasional.hutang.store')}}" method="post">
			    <input type="hidden" name="_method" value="post">
			    {{csrf_field()}}
			    <div class="row">
			        <div class="col-sm-12">
			            {{-- <h3 class="sub-title">Form Belanja ATK</h3> --}}
			             <div class="form-group row">
	                        <label class="col-sm-2 col-form-label" for="jumlah">Saldo Cabang</label>
	                        <div class="col-sm-10">
	                           <input value="{{$saldo_cabang->nominal_total_saldo}}" type="text" class="form-control" name="jumlah" id="jumlah" disabled>
	                           <input type="hidden" name="id_cabang" value="{{$saldo_cabang->id_cabang}}">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-2 col-form-label">Jumlah</label>
	                        <div class="col-sm-8 col-lg-10">
	                            <div class="input-group">
	                                <span class="input-group-addon" id="basic-addon1">Rp</span>
	                                <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="jumlah" id="jumlah" placeholder="Jumlah" required>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
	                        <div class="col-sm-10">
	                           <textarea rows="5" cols="5" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required></textarea>
	                        </div>
	                    </div>
			        </div>
			    </div>
			    <button type="submit" class="btn btn-primary btn-xs ">Proses</button>
				</form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success waves-effect" >Proses</button>
            </div> --}}
        </div>
    </div>
</div>