@extends('_layouts.default')

@section('script-bottom')
<!-- Masking js for form format number --> 
<script src="{{asset('adminty/files/assets/pages/form-masking/inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/jquery.inputmask.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/autoNumeric.js')}}"></script>
<script src="{{asset('adminty/files/assets/pages/form-masking/form-mask.js')}}"></script>
<script>
    $(function(){
        $('#marhun_bih').on('keyup' ,function(){
            var data = this.value.replace(",","").replace(".","")
            $('#terbilang').val(terbilang(data));
            $('#terbilang2').val(terbilang(data));
            // console.log(data);
        });
    });

    function timePeriod(time)
    {
        var tanggal_jatuh_tempo = moment().add(time, 'days').format('Y-MM-DD');

        $('#tanggal_jatuh_tempo').val(tanggal_jatuh_tempo)

        var opsi_pembayaran = $('input[name="opsi_pembayaran"]')

        $.each(opsi_pembayaran, function(){
            var value = $(this).val()

            if(value <= time){
                $('#op_'+value).css('display', '')
            }else{
                // console.log(value);
                $('#op_'+value).css('display', 'none')
            }
        })
    }

    function itemType(type)
    {
        if(type == 'elektronik'){
            $('#item_elektronik').css('display', '')
            $('#item_kendaraan').css('display', 'none')
        }else{
            $('#item_elektronik').css('display', 'none')
            $('#item_kendaraan').css('display', '')
        }
    }
</script>
@endsection

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4 class="">Akad Baru</h4>
                    {{-- <span>Rincian Dana</span> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
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
 <form action="{{$action}}" method="post">
<input type="hidden" name="_method" value="post">
{{csrf_field()}}
<div class="page-body">
    @include('akad.form.time')

    <div class="row">
        <div class="col-sm-12">
             <div class="card">
                <div class="card-block">
                    <h3 class="sub-title">No. ID</h3>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="no_id">No. ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001" disabled>
                            <input type="hidden" class="form-control" name="no_id" id="no_id" value="C99-01-030417-001">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('akad.form.marhun')

    @include('akad.form.rahin')
    </form>
</div>
@endsection
