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
            var marhun_bih = this.value.replace(",","").replace(".","").replace(".","").replace(".","")

            if(marhun_bih == 0){ marhun_bih = 0 }

            // process 'terbilang' of 'marhub_bih'
            $('#terbilang').val(terbilang(marhun_bih));
            $('#terbilang2').val(terbilang(marhun_bih));

            // determine 'biaya admin' from 'marhun_bih'
            biaya_admin(marhun_bih)

            // determine 'biaya titip'
            biaya_titip(marhun_bih, 'marhun_bih')
        });

        // for default checked 'OPSI PEMBAYARAN HARIAN / 1'
        $('#op_1,#op_7').css('display', '') 
    });

    // setting value 'opsi pembayaran'
    function valueOptionPayment(value)
    {
        $('#nilai_opsi_pembayaran').val(value)

        biaya_titip(value, 'opsi_pembayaran')
    }

    // determine 'biaya admin'
    function biaya_admin(marhun_bih)
    {
        var persenan  = $('#persenan').val()
        var biaya_admin = marhun_bih * (persenan/100)
        
        $('#biaya_admin1').val(format_nominal(biaya_admin))
        $('#biaya_admin2').val(biaya_admin)
    }

    // determine 'biaya titp'
    // value is nilai from 'marhun_bih' or 'opsi_pembayaran'
    // option for condition between marhun bih and 'opsi_pembayaran'
    function biaya_titip(value, option)
    {
        var persenan        = $('#persenan').val() / 100
        var jenis_barang    = $('#nilai_jenis_barang').val()
        var opsi_pembayaran = $('#nilai_opsi_pembayaran').val()
        var bt_yang_dibayar = $('#bt_yang_dibayar').val()

        // override base on condition form 'opsi_pembayaran'
        if(option == 'marhun_bih'){
            marhun_bih = value
        }else if(option == 'opsi_pembayaran'){
            opsi_pembayaran = value
            marhun_bih = $('#marhun_bih').val().replace(".","").replace(".","").replace(".","")
        }

        if(jenis_barang == 'elektronik'){
            if(opsi_pembayaran == 1){
                var result = marhun_bih * persenan - (10000 / 2) / 7
            }else if (opsi_pembayaran == 15){
                var result = marhun_bih * persenan 
            }else{
                var result = marhun_bih * persenan - (10000 / 2)
            }

            var biaya_titip = result * bt_yang_dibayar

            // condition for negativ number
            biaya_titip = biaya_titip <= 0 ? 0 : biaya_titip
        }else{
            var biaya_titip = marhun_bih
        }

        var nominal_biaya_titip = format_nominal(biaya_titip)
        nominal_biaya_titip     = nominal_biaya_titip.replace("Rp", "")
        $('#biaya_titip').val(nominal_biaya_titip)

        nominal_biaya_titip = nominal_biaya_titip <= 0 ? 0 : nominal_biaya_titip

        var jml_bt_yang_dibayar = nominal_biaya_titip.toString().replace(",","").replace(".","").replace(".","").replace(".","")
        $('#jml_bt_yang_dibayar').val(terbilang(jml_bt_yang_dibayar))
    }

    // determine 'tanggal jatuh tempo' base on 'tanggal akad'
    function timePeriod(time)
    {
        var tanggal_jatuh_tempo = moment().add(time, 'days').format('Y-MM-DD');
        $('#tanggal_jatuh_tempo').val(tanggal_jatuh_tempo)

        // function local
        paymentOption(time)
    }

    // setting show / hide 'opsi pembayaran' base on 'jangka waktu akad'
    function paymentOption(time)
    {
        var opsi_pembayaran = $('input[name="opsi_pembayaran"]')

        $.each(opsi_pembayaran, function(){
            var value = $(this).val()

            // condition value of 'opsi_pembayaran' with value time of 'jangka_waktu_akad' 
            if(value <= time){
                $('#op_'+value).css('display', '')
            }else{
                $('#op_'+value).css('display', 'none')
            } 
        })
    }

    // determine detail item base on 'jenis barang'
    function itemType(type)
    {   
        // value real 'persenan' from database
        var persenan_real = $('#persenan-real').val()

        if(type == 'elektronik'){
            $('#item_elektronik').css('display', '')
            $('#item_kendaraan').css('display', 'none')
            //get value 'jenis_kendaraan'
            $('#nilai_jenis_barang').val('elektronik')
            // for condition if type == 'elektronik'. 'persenan' = 10% or etc
            $('.persenan').val(persenan_real)
        }else{
            $('#item_elektronik').css('display', 'none')
            $('#item_kendaraan').css('display', '')
            //get value 'jenis_kendaraan'
            $('#nilai_jenis_barang').val('kendaraan')
            // for condition if type == 'kendaraan'. 'persenan' = 0
            $('.persenan').val(0)
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
