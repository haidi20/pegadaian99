@extends('_layouts.default')

@section('script-bottom')
    <!-- Masking js for form format number --> 
    <script src="{{asset('adminty/files/assets/pages/form-masking/inputmask.js')}}"></script>
    <script src="{{asset('adminty/files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
    <script src="{{asset('adminty/files/assets/pages/form-masking/autoNumeric.js')}}"></script>
    <script src="{{asset('adminty/files/assets/pages/form-masking/form-mask.js')}}"></script>
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
<div class="page-header">
    <div class="row">
        <div class="col-sm-12 col-md-12">
             {!! session()->get('message') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Tambah Data</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Form Picker</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
<div class="page-body">
	<form action="{{route('operasional.store')}}" method="post">
    <input type="hidden" name="_method" value="post">
    {{csrf_field()}}
    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">Form Belanja ATK</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="jumlah">Jumlah</label>
                        <div class="col-sm-8 col-lg-10">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Rp.</span>
                                <input type="text" class="form-control autonumber" data-v-min="0" data-v-max="9999999999" data-a-sep="." data-a-dec="," name="jumlah" id="jumlah" value="{{old('jumlah')}}" placeholder="Jumlah" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                        <div class="col-sm-10">
                           <textarea rows="5" cols="5" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xs">Proses</button>
                </div>
            </div>
        </div>
    </div>
	</form>
</div>
@endsection
