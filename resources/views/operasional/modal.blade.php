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
                <form action="#" method="post">
			    <input type="hidden" name="_method" value="post">
			    {{csrf_field()}}
			    <div class="row">
			        <div class="col-sm-12">
			            {{-- <h3 class="sub-title">Form Belanja ATK</h3> --}}
			             <div class="form-group row">
	                        <label class="col-sm-2 col-form-label" for="jumlah">Saldo Cabang</label>
	                        <div class="col-sm-10">
	                           <input value="0" type="text" class="form-control" name="jumlah" id="jumlah" disabled>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-2 col-form-label" for="jumlah">Jumlah</label>
	                        <div class="col-sm-10">
	                           <input placeholder="Jumlah" type="text" class="form-control" name="jumlah" id="jumlah"required>
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
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success waves-effect" >Proses</button>
            </div>
        </div>
    </div>
</div>