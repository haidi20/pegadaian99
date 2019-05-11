<script>
    $(function(){

        // setting show / hide 'opsi pembayaran' base on 'jangka waktu akad'
        jangka_waktu_akad()

        // set number when typing form 'taksiran marhun'
        taksiran_marhun_keyup()

        // for fetch nominal marhun_bih
        marhun_bih_keyup()

        // for default checked 'OPSI PEMBAYARAN HARIAN / 1'
        $('#op_1,#op_7').css('display', '') 

        // condition option of form 'biaya titip yang dibayar'
        bt_yang_dibayar()

        // for custom height form wizard
        custom_form_wizard()
    });

    function taksiran_marhun_keyup()
    {
        $('#taksiran_marhun').on('keyup' ,function(){
            this.value = formatRupiah(this.value)
        });
    }

    function marhun_bih_keyup()
    {
        $('#marhun_bih').on('keyup' ,function(){
            this.value = formatRupiah(this.value)

            var marhun_bih = this.value.replace(",","").replace(".","").replace(".","").replace(".","")

            marhun_bih = marhun_bih == 0 ? 0 : marhun_bih

            // process 'terbilang' of 'marhub_bih'
            $('.terbilang').val(terbilang(marhun_bih));
            $('.terbilang').val(terbilang(marhun_bih));

            // determine 'biaya titip'
            biaya_titip(marhun_bih, 'marhun_bih')
        });
    }

    function bt_yang_dibayar()
    {
        $('#bt_yang_dibayar').change(function(){
            var value = $(this).children("option:selected").val();

            // determine 'biaya titip'
            biaya_titip(value, 'bt_yang_dibayar')
        });
    }

    function jangka_waktu_akad()
    {
        $('#jangka_waktu_akad').change(function(){
            var waktu = $(this).children("option:selected").val();

            var tanggal_jatuh_tempo = moment().add(waktu, 'days').format('DD-MM-Y');
            $('#tanggal_jatuh_tempo').val(tanggal_jatuh_tempo)

            // console.log(time)
            // function local
            paymentOption(waktu)
        });
    }

    // setting show / hide 'opsi pembayaran' base on 'jangka waktu akad'
    function paymentOption(time)
    {
        if(time == 7){
            $('#op_15').css('display', 'none')
        }else{
            $('#op_15').css('display', '')
        }
    }

    // setting value 'opsi pembayaran'
    function valueOptionPayment(value)
    {
        $('#nilai_opsi_pembayaran').val(value)

        biaya_titip(value, 'opsi_pembayaran')
    }

    // determine 'biaya titp'
    // value is nilai from 'marhun_bih', 'opsi_pembayaran', or 'jenis_barang'
    // option for condition between marhun bih, 'opsi_pembayaran' and 'jenis_barang'
    function biaya_titip(value, option)
    {
        var persenan        = $('#persenan').val() / 100

        // override base on condition form 'opsi_pembayaran'
        if(option == 'marhun_bih'){
            marhun_bih = value
        }else{
            marhun_bih = $('#marhun_bih').val().replace(".","").replace(".","").replace(".","")
        }

        if(option == 'opsi_pembayaran'){
            var opsi_pembayaran = value
        }else{
            var opsi_pembayaran = $('#nilai_opsi_pembayaran').val()
        }

        if(option == 'jenis_barang'){
            var jenis_barang = value
        }else{
            var jenis_barang = $('#nilai_jenis_barang').val()
        }

        if(option == 'bt_yang_dibayar'){
            var bt_yang_dibayar = value
        }else{
            var bt_yang_dibayar = $('#bt_yang_dibayar').val()
        }

        // set nominal 'potongan biaya titip'
        if(jenis_barang == 'elektronik'){
            var potongan = {{$potongan}}
            var persenan = {{$margin_elektronik}} / 100
        }else{
            var potongan = null
            var persenan = {{$margin_kendaraan}} / 100
        }

        // formula 'opsi_pembayaran'
        if(opsi_pembayaran == 1){
            var biaya_titip = (marhun_bih * persenan - potongan) / 2 / 7
        }else if (opsi_pembayaran == 15){
            var biaya_titip = marhun_bih * persenan 
        }else{
            var biaya_titip = (marhun_bih * persenan - potongan) / 2
        }

        // condition for negatif number of 'biaya titip'
        biaya_titip = biaya_titip <= 0 ? 0 : biaya_titip

        if(biaya_titip >= 1000 && biaya_titip != 0){
            thousand_bt             = '.000'
        }else{
            thousand_bt             = null
        }

        var nominal_biaya_titip = format_nominal(biaya_titip)
        nominal_biaya_titip     = nominal_biaya_titip.replace("Rp", "")
        nominal_biaya_titip     = Math.ceil(nominal_biaya_titip)+thousand_bt
        $('.biaya_titip').val(nominal_biaya_titip)

        var jml_bt_yang_dibayar = biaya_titip * bt_yang_dibayar

        if(jml_bt_yang_dibayar >= 1000 & jml_bt_yang_dibayar != 0){
            var thousand_jml_bt = '.000'
        }else{
            var thousand_jml_bt = null
        }

        jml_bt_yang_dibayar     = format_nominal(jml_bt_yang_dibayar)
        
        jml_bt_yang_dibayar     = jml_bt_yang_dibayar.replace("Rp", "")
        jml_bt_yang_dibayar     = Math.ceil(jml_bt_yang_dibayar)+thousand_jml_bt
        $('.jml_bt_yang_dibayar').val(jml_bt_yang_dibayar)
    }

    // determine detail item base on 'jenis barang'
    function itemType(type)
    {   
        // value real 'persenan' from database
        var persenan_real = $('#persenan-real').val()

        if(type == 'elektronik'){
            $('.kelengkapan_barang_satu').html('Type')
            $('.kelengkapan_barang_dua').html('Merk')
            $('.kelengkapan_barang_tiga').html('Imei / Nomor Serial')
            //get value 'jenis_kendaraan'
            $('#nilai_jenis_barang').val('elektronik')
            // set 'biaya admin'
            var biaya_admin = format_nominal(10000)
            biaya_admin = biaya_admin.replace("Rp", "")
            $('.biaya_admin').val(biaya_admin)
            // condition 'persenan'
            $('.persenan').val({{$margin_elektronik}})
            // for condition 'biaya titip'
            biaya_titip('elektronik', 'jenis_barang')
        }else{
            $('.kelengkapan_barang_satu').html('KT')
            $('.kelengkapan_barang_dua').html('Warna')
            $('.kelengkapan_barang_tiga').html('Nomor Rangka')
            //get value 'jenis_kendaraan'
            $('#nilai_jenis_barang').val('kendaraan')
            // set 'biaya admin'
            var biaya_admin = format_nominal(50000)
            biaya_admin = biaya_admin.replace("Rp", "")
            $('.biaya_admin').val(biaya_admin)
            // condition 'persenan' base on 'jenis barang'
            $('.persenan').val({{$margin_kendaraan}})
            // for condition 'biaya titip'
            biaya_titip('kendaraan', 'jenis_barang')
        }
    }

    function akad_confirm()
    {
        var data = $('#example-advanced-form').serializeArray();
        var array = [];

        $.each(data, function(index, item){
            array[item.name] = item.value;
        });

        // console.log(array.biaya_admin);

        // $('#modal-akad-confirm').modal('show')
    }

    function custom_form_wizard()
    {
        function adjustIframeHeight() {
            var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe
                $iframe.height($body.height());
            }
        }

        
    }
</script>