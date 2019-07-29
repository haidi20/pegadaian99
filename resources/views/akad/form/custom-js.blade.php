<script>
    $(function(){

        // setting show / hide 'opsi pembayaran' base on 'jangka waktu akad'
        jangka_waktu_akad()

        // set number when typing form 'taksiran marhun'
        taksiran_marhun_keyup()

        // for fetch nominal 'marhun_bih'
        marhun_bih_keyup()

        // condition option of form 'biaya titip yang dibayar'
        bt_yang_dibayar()

        //auto suggest 'data rahin > nama lengkap'
        nama_lengkap_keyup() 

        // for custom height form wizard
        custom_form_wizard()

        jenis_barang_pilih('{{$jenis_barang}}')

        paymentOption({{$opsi_pembayaran}})

         // process 'terbilang' of 'marhub_bih'
         $('.terbilang').val(terbilang({{old('nilai_pencairan')}})+' rupiah');
    });

    function nama_lengkap_keyup()
    {
        $.ajax({
            url: '{{url("nasabah/ajax")}}',
            type: 'GET',
            cache: false,
            success:function(result){		
                // console.log(result.nasabah)
                var nama_lengkap =  $("#nama_lengkap");

                nama_lengkap.autocomplete({
                    source: result.data,
                    select: function( event, ui ) {
                        var name = ui.item.value;
                        
                        get_full_data_nasabah(name)
                    },
                });
            },
            error:function(xhr, ajaxOptions, thrownError){
               console.log(thrownError)
            }
        });
    }

    function get_full_data_nasabah(value)
    {
        $.ajax({
            url: '{{url("nasabah/ajax")}}',
            type: 'GET',
            cache: false,
            data: {nama_nasabah: value, type: 'full'},
            success:function(result){	
                var data = result.data ;

                insert_form_nasabah(data);
            },
            error:function(xhr, ajaxOptions, thrownError){
               console.log(thrownError)
            }
        });
    }

    function insert_form_nasabah(data)
    {
        // insert to form 'jenis kelamin'
        if(data.jenis_kelamin == 'Pria'){
            $('#jk_pria').prop('checked', true);
        }else if(data.jenis_kelamin == 'Wanita'){
            $('#jk_wanita').prop('checked', true);
        }

        if(data.jenis_id == 'KTP'){
            $('#jenis_KTP').prop('checked', true);
        }else if(data.jenis_id == 'SIM'){
            $('#jenis_SIM').prop('checked', true);
        }else if(data.jenis_id == 'KK'){
            $('#jenis_KK').prop('checked', true);
        }

        $('#kota').val(data.kota);
        $('#alamat').val(data.alamat);
        $('#no_telp').val(data.no_telp);
        $('#no_identitas').val(data.no_identitas);
        $('#tanggal_lahir').val(data.tanggal_lahir);
        // $('#no_telp').val(data.no_telp);
    }

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

            var marhun_bih = this.value.replace(",","").replace(".","").replace(".","").replace(".","").replace(".","")

            marhun_bih = marhun_bih == 0 ? 0 : marhun_bih

            rupiah = marhun_bih == 0 ? '' : ' Rupiah'

            // process 'terbilang' of 'marhub_bih'
            $('.terbilang').val(terbilang(marhun_bih)+rupiah);

            // determine 'biaya titip'
            biaya_titip(marhun_bih, 'marhun_bih')
        });
    }

    function jangka_waktu_akad()
    {
        $('#jangka_waktu_akad').change(function(){
            var waktu = $(this).children("option:selected").val();

            var tanggal_jatuh_tempo = moment().add(waktu, 'days').format('DD-MM-Y');
            $('#tanggal_jatuh_tempo').val(tanggal_jatuh_tempo)

            // function local
            paymentOption(waktu)

            bt_yang_dibayar(waktu, 'jangka_waktu_akad')
        });
    }

    // setting show / hide 'opsi pembayaran' base on 'jangka waktu akad'
    function paymentOption(time)
    {
        if(time == 7 || time == 1){
            $('#op_15').css('display', 'none')

            $('#op_'+time+' label input').prop('checked', true)
            kondisi_nilai_opsi_pembayaran(time)
        }else{
            $('#op_15').css('display', '')
        }
    }

    // setting value 'opsi pembayaran'
    function kondisi_nilai_opsi_pembayaran(value)
    {
        // insert data tag input hidden for send data
        $('#nilai_opsi_pembayaran').val(value)

        // set 'biaya titip' base on 'opsi pembayaran' one of 'rumus'
        biaya_titip(value, 'opsi_pembayaran')

        // condition maks number looping 'biaya titip yang dibayar'
        bt_yang_dibayar(value, 'opsi_pembayaran')
    }

    /* determine 'biaya titp yang dibayar'
    * value from 'jangka waktu akad' and 'opsi pembayaran' 
    * option for condition between 'jangka waktu akad' and 'opsi pembayaran'
    */
    function bt_yang_dibayar(value = null, option = null)
    {   
        // set number maks base on 'jangka waktu akad' and 'opsi pembayaran'
        kondisi_bt_yang_dibayar(value, option);
        
        // condition if 'biaya titip yang dibayar' choose value number
        $('#bt_yang_dibayar').change(function(){
            var value = $(this).children("option:selected").val();

            // determine 'biaya titip'
            biaya_titip(value, 'bt_yang_dibayar');

            // determine 'bt_minggu_ke'
            bt_minggu_ke(value);
        });
    }

    function bt_minggu_ke(value)
    {
        if(value >= 1){
            $('#bt_minggu_ke').val('0 - '+value);
        }
    }

    function kondisi_bt_yang_dibayar(value = null, option = null)
    {
        var maks    = '';
        var tagOptions  = [];


        if(option == 'jangka_waktu_akad'){
            var jangka_waktu_akad = $('#jangka_waktu_akad').children("option:selected").val();
        }else{
            var jangka_waktu_akad = $('#jangka_waktu_akad').children("option:selected").val();
        }

        if(option == 'opsi_pembayaran'){
            var opsi_pembayaran = value
        }else{
            var opsi_pembayaran = $('#nilai_opsi_pembayaran').val()
        }

        if(option == 'jenis_barang'){
            // set 'opsi_pembayaran' = 1
            var opsi_pembayaran = value
        }else{
            var opsi_pembayaran = $('#nilai_opsi_pembayaran').val()
        }

        if(jangka_waktu_akad == 7){
            if(opsi_pembayaran == 1){
                maks = 7;
            }else if(opsi_pembayaran == 7){
                maks = 1;
            }
        }else if(jangka_waktu_akad == 15){
            if(opsi_pembayaran == 1){
                maks = 15;
            }else if(opsi_pembayaran == 7){
                maks = 2;
            }
            else if(opsi_pembayaran == 15){
                maks = 1;
            }
        }else if(jangka_waktu_akad == 30){
            if(opsi_pembayaran == 1){
                maks = 15;
            }else if(opsi_pembayaran == 7){
                maks = 4;
            }
            else if(opsi_pembayaran == 15){
                maks = 2;
            }
        }else if(jangka_waktu_akad == 60){
            if(opsi_pembayaran == 1){
                maks = 15;
            }else if(opsi_pembayaran == 7){
                maks = 9;
            }
            else if(opsi_pembayaran == 15){
                maks = 4;
            }
        }

        for(var i = 0; i <= maks; i++){
            if(i == 0){
                tagOptions = tagOptions + '<option value="'+i+'" selected>'+i+'</option>';

                //set value 'nilai biaya titip yang dibayar' 0
                $('#nilai_bt_yang_dibayar').val(0);
            }else{
                tagOptions = tagOptions + '<option value="'+i+'">'+i+'</option>';
            }
        }

        $('#bt_yang_dibayar').html(tagOptions);
    }

    function process()
    {
        var saldo       = {{$infoCabang->total_kas_rumus}};
        var marhun_bih  = $('#marhun_bih').val().replace(".","").replace(".","").replace(".","");

        if(saldo <= marhun_bih){
            swal({
                title: "Pemberitahuan!",
                text: "Saldo Anda Tidak Cukup!",
                icon: "error",
                button: "Oke!",
                dangerMode: true,
            });
        }else{
            insert_akad_baru()
        }
    }

    function insert_akad_baru()
    {
        var data        = $('form').serializeArray();
        var url_akad    = '{{$action}}';
        var url_print   = '{{route("print")}}';
        var url_pdf     = '{{route("pdf")}}';
        // console.log(data);

        // first insert data to table 'akad'
        $.ajax({
            url: url_akad,
            type: 'POST',
            cache: false,
            data: {data: data},
            success:function(result){		
                swal({
                    title: "Pemberitahuan!",
                    text: "Data Akad Baru Berhasil!",
                    icon: "success",
                }).then(function() {
                    // if success, redirect to page 'database > data akad nasabah > nasabah akad'
                    // window.location.href = '{{route("akad.nasabah-akad")}}';

                    console.log(result)
                });
                
                // new tab for print after than new tab again for PDF 
                // $.redirect(url_print, {
                //     data: data,
                //     url_pdf: url_pdf
                // }, "GET", "_blank");
            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log(thrownError)
            }
        });
    }

    /* determine 'biaya titp'
    * value is 'nilai' from 'marhun_bih', 'opsi_pembayaran', or 'jenis_barang'
    * option for condition between 'marhun bih', 'opsi_pembayaran' and 'jenis_barang'
    */
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
            var bt_yang_dibayar = $('#nilai_bt_yang_dibayar').val();
        }

        // set nominal 'potongan biaya titip'
        if(jenis_barang == 'elektronik'){
            var potongan = {{$potongan_elektronik ? $potongan_elektronik : 0}}
            var persenan = {{$margin_elektronik ? $margin_elektronik : 1}} / 100
        }else{
            var potongan = {{$potongan_kendaraan ? $potongan_kendaraan : 0}}
            var persenan = {{$margin_kendaraan ? $margin_kendaraan : 1}} / 100
        }

        // formula 'opsi_pembayaran'
        if(opsi_pembayaran == 1){
            var biaya_titip = (marhun_bih * persenan - potongan) / 2 / 7
        }else if(opsi_pembayaran == 7){
            var biaya_titip = (marhun_bih * persenan - potongan) / 2
        }else if (opsi_pembayaran == 15){
            var biaya_titip = marhun_bih * persenan 
        }

        // condition for negatif number of 'biaya titip'
        biaya_titip = biaya_titip <= 0 ? 0 : biaya_titip

        if(biaya_titip >= 1000 && biaya_titip != 0){
            thousand_bt             = 1000
        }else{
            thousand_bt             = 1
        }

        biaya_titip     = format_nominal(biaya_titip)
        biaya_titip     = biaya_titip.replace("Rp", "")
        biaya_titip     = Math.ceil(biaya_titip) * thousand_bt
        var nominal_biaya_titip     = formatRupiah(biaya_titip.toString())  
        $('.biaya_titip').val(nominal_biaya_titip)

        // 'rumus jumlah biaya titip yang dibayar'
        var jml_bt_yang_dibayar = biaya_titip * bt_yang_dibayar

        // console.log(jml_bt_yang_dibayar)

        jml_bt_yang_dibayar     = jml_bt_yang_dibayar
        jml_bt_yang_dibayar     = formatRupiah(jml_bt_yang_dibayar.toString())
        $('.jml_bt_yang_dibayar').val(jml_bt_yang_dibayar)
    }

    // determine detail item base on 'jenis barang'
    function jenis_barang_pilih(type)
    {   
        // value real 'persenan' from database
        var persenan_real = $('#persenan-real').val()

        if(type == 'Elektronik'){
            $('.kelengkapan_barang_satu').html('Type')
            $('.kelengkapan_barang_dua').html('Merk')
            $('.kelengkapan_barang_tiga').html('Imei / Nomor Serial')
            //hide / show 'detail jenis barang'
            $('.detail-elektronik').show()
            $('.detail-kendaraan').hide()
            $('#smartphone').prop('checked', true)
            //insert value 'jenis_kendaraan'
            $('#nilai_jenis_barang').val('elektronik')
            // set 'biaya admin'
            biaya_admin = 10000
            biaya_admin = formatRupiah(biaya_admin.toString())
            $('.biaya_admin').val(biaya_admin)
            // insert value 'persenan'
            $('.persenan').val({{$margin_elektronik}})
            // for condition 'biaya titip'
            biaya_titip('elektronik', 'jenis_barang')
            // set value default 1
            var nilai_opsi_pembayaran = $('#nilai_opsi_pembayaran').val()
            bt_yang_dibayar(nilai_opsi_pembayaran, 'jenis_barang')
        }else if(type == 'Kendaraan'){
            $('.kelengkapan_barang_satu').html('KT')
            $('.kelengkapan_barang_dua').html('Warna')
            $('.kelengkapan_barang_tiga').html('Nomor Rangka')
            //hide / show 'detail jenis barang'
            $('.detail-elektronik').hide();
            $('.detail-kendaraan').show();
            $('#motor').prop('checked', true)
            //insert value 'jenis_kendaraan'
            $('#nilai_jenis_barang').val('kendaraan')
            // set 'biaya admin'
            biaya_admin = 50000
            biaya_admin = formatRupiah(biaya_admin.toString())
            $('.biaya_admin').val(biaya_admin)
            // insert value 'persenan' base on 'jenis barang'
            $('.persenan').val({{$margin_kendaraan}})
            // for condition 'biaya titip'
            biaya_titip('kendaraan', 'jenis_barang')
            // set value default 0
            var nilai_opsi_pembayaran = $('#nilai_opsi_pembayaran').val()
            bt_yang_dibayar(nilai_opsi_pembayaran, 'jenis_barang')
        }
    }

    //condition = stepOne or stepTwo
    function akad_confirm(condition)
    {
        var data = $('#example-advanced-form').serializeArray();

        if(condition == 'stepOne'){
            $('#modal-akad-confirm-stepOne').modal('show')
        }else if(condition == 'stepTwo'){
            $('#modal-akad-confirm-stepTwo').modal('show')
        }

        // manipulation html in model confirm
        insert_data_confirm(data)
    }

    // process insert data for modal confirm
    function insert_data_confirm(data)
    {
        $.each(data, function(index, item){
            kondisi_jenis_barang(item);

            if(item.name == 'taksiran_marhun'){
                $('.data-'+item.name).text(': Rp.'+item.value);
            }else if(item.name == 'marhun_bih'){
                $('.data-'+item.name).text(': Rp.'+item.value);
            }else if(item.name == 'biaya_titip'){
                $('.data-'+item.name).text(': Rp.'+item.value);
            }else if(item.name == 'jml_bt_yang_dibayar'){
                $('.data-'+item.name).text(': Rp.'+item.value);
            }else if(item.name == 'biaya_admin'){
                $('.data-'+item.name).text(': Rp.'+item.value);
            }else if(item.name == 'tanggal_lahir'){
                $('.data-'+item.name).text(': '+moment().add(item.value, 'days').format('DD-MM-Y'));
            }else if(item.name == 'jangka_waktu_akad' || item.name == 'opsi_pembayaran'){
                if(item.value == 1){
                    var value = 'Sehari';
                }else if(item.value > 1){
                    var value = item.value + ' Hari';
                }
                $('.data-'+item.name).text(': '+value);
            }else if(item.name == 'kelengkapan' || item.name == 'kekurangan'){
                $('.data-'+item.name).text(item.value);
            }else{
                $('.data-'+item.name).text(': '+item.value);
            }
        });
    }

    function kondisi_jenis_barang(item)
    {
        if(item.value == 'kendaraan'){
            var barang_satu = 'KT';
            var barang_dua = 'Warna';
            var barang_tiga = 'Nomor Rangka';
        }else if(item.value == 'elektronik'){
            var barang_satu = 'Type';
            var barang_dua = 'Merk';
            var barang_tiga = 'Imei / Nomor Serial';
        }

        $('.name-kelengkapan_barang_satu').html(barang_satu);
        $('.name-kelengkapan_barang_dua').html(barang_dua);
        $('.name-kelengkapan_barang_tiga').html(barang_tiga);
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