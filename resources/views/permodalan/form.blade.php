@extends('_layouts.default')

@section('script-bottom')
	<script>
		$('#jenis_modal').on('change', function(){
			var card_form 	= $('.card-form')
			var title_form	= ''
			var jenis_modal = $(this).val()
			var form_cabang = $('.cabang')

			// show / hide base on option 'jenis_modal'
			if(jenis_modal){
				card_form.css('display', '')
			}else{
				card_form.css('display', 'none')
			}

			if(jenis_modal == 'hutang_cabang'){
				form_cabang.css('display', '')
			}else{
				form_cabang.css('display', 'none')
			}

			// change title form base on  option 'jenis_modal'
			if(jenis_modal == 'hutang_cabang'){
				title_form = 'Hutang Cabang'
			}else if(jenis_modal == 'hutang_personal'){
				title_form = 'Hutang Personal'
			}else if(jenis_modal == 'penambahan_kas_saldo'){
				title_form = 'Penambahan Kas Saldo'
			}

			$('.title-form').html(title_form)
		})
	</script>
@endsection

@section('content')
<div class="page-body">
	<form action="{{route('permodalan.store')}}" method="post">
    <input type="hidden" name="_method" value="post">
    {{csrf_field()}}
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Jenis Modal</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="jenis_modal">Jenis</label>
                        <div class="col-sm-10">
                            <select name="jenis_modal" id="jenis_modal" class="form-control form-control-success">
                                <option value="">Pilih Jenis Modal</option>
                                <option value="hutang_cabang">Hutang Cabang</option>
                                <option value="hutang_personal">Hutang Personal</option>
                                <option value="penambahan_kas_saldo">Penambahan Kas Saldo</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
             <div class="card card-form" style="display:none">
                <div class="card-block">
                    <h3 class="sub-title title-form"></h3>
                    <form action="#" method="post">
                        <input type="hidden" name="_method" value="post">
                        {{csrf_field()}}
                        <div class="form-group row cabang">
                            <label class="col-sm-2 col-form-label" for="cabang">Cabang</label>
                            <div class="col-sm-10">
	                            <select name="cabang" id="cabang" class="form-control">
	                                
	                            </select>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
	</form>
</div>
@endsection
