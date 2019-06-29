<script>

    // type is between pelunasan and biaya titip
    function prosedur(id, type)
    {
        if(type == 'pelunasan'){
            // show word 'total'
            $('#pelunasan').css('display', '')
            // show 'keterangan total'
            $('#keterangan_total').show()
            // change title modal = 'pelunasan'
            $('.prosedur-title').html('Pelunasan')
            // active button 'bayar'
            $('.bayar').removeClass('disabled')
        }else if(type == 'biaya_titip'){
             // hide word 'total'
            $('#pelunasan').css('display', 'none')
            // hide 'keterangan total'
            $('#keterangan_total').css('display', 'none')
             // change title modal = 'Pembayaran Biaya Titip'
            $('.prosedur-title').html('Pembayaran Biaya Titip')
            // disabled button 'bayar'
            $('.bayar').addClass('disabled')
        }

        $('#modal-prosedur').modal('show');

        akad_prosedur(id, type)
    }

    function custom_checkbox(condition)
    {
        var from            = $('.from_checkbox').val()
        var until           = $('.until_checkbox').val()
        var default_until   = parseInt($('.default_until_checkbox').val())

        if(condition == 'add'){
            until++;
            $('.until_checkbox').val(until)

             // show checkbox base on add time and remove time
            add_remove_checkbox(from, until, condition)
        }

        if(condition == 'delete'){
            if(until > default_until){
                until--;
                $('.until_checkbox').val(until)

                // show checkbox base on add time and remove time
                add_remove_checkbox(from, until, condition)
            }            
        }
    }

    function add_remove_checkbox(from, until, condition)
    {
        checkbox = '';

        // 'untuk mendapatkan nilai checkbox yang tercentang'
        var checked = '';
        $('input[type=checkbox]').each(function () {
            if (this.checked){
                checked = $(this).val();
            }           
        });
        checked = Number(checked) + 2;

        if(until >= checked){
            disabled = 'disabled';
        }else{
            disabled = '';
        }

        checkbox = checkbox + '<div class="checkbox-color checkbox-success checkbox'+until+'">';
        checkbox = checkbox + '<input id="checkbox'+until+'" type="checkbox" class="checkbox'+until+'" '+disabled+' value="'+until+'" onCLick="condition_disabled('+until+')">';
        checkbox = checkbox + '<label for="checkbox'+until+'" class="checkbox'+until+'">';
        checkbox = checkbox + until;
        checkbox = checkbox + '</label>';
        checkbox = checkbox + '</div>'; 

        if(condition == 'add'){
            $('.checkbox').append(checkbox)
        }else if(condition == 'delete'){
            until = until + 1;

            $('.checkbox'+until).remove()
        }
    }

    function condition_disabled(value)
    {
        var from            = $('.from_checkbox').val();
        var until           = $('.until_checkbox').val();
        var opsi_pembayaran = $('.opsi_pembayaran').val();
        var nilai_pencairan = $('.nilai_pencairan').val();

        var selanjutnya = parseInt(value) + 1;
        var biaya_titip = $('.bt_7_hari').val();
        biaya_titip = Number(biaya_titip);

        // condition if checkbox nothing checked 'waktu_ke' set value 0
        // and active / disabled button 'bayar'
        if($('#checkbox'+from).prop('checked') == true){
            var waktu_ke = value - (from - 1);

            $('.bayar').removeClass('disabled');
        }else{
            var waktu_ke = 0;

            $('.bayar').addClass('disabled');
        }

        // condition if checkbox not checked and then 'melakukan pengurangan pada jumlah waktu dan biaya titip'
        if($('#checkbox'+value).prop('checked') == false){
            if(waktu_ke != 0){
                var biaya_titip = (biaya_titip * waktu_ke) - biaya_titip;
                waktu_ke = waktu_ke - 1;
            }else{
                var biaya_titip = 0;
            }
        }else{
            // 'rumus biaya titip dikalikan dengan jumlah hari/minggu di pilih'
            var biaya_titip = biaya_titip * waktu_ke;
        }

        // condition word 'harian' or 'mingguan'
        if(opsi_pembayaran == 1){
            var satuan_waktu = 'Hari';
        }else if(opsi_pembayaran == 7 || opsi_pembayaran == 15){
            var satuan_waktu = 'Minggu';
        }

        var format_total = Number(nilai_pencairan) + Number(biaya_titip);
        format_total = formatRupiah(format_total.toString());
        var keterangan_total = 'Total Pembayaran : Rp. '+format_total;
        $('#keterangan_total').html(keterangan_total);

        // insert data to tag input
        $('.nominal_total').val(format_total);
        biaya_titip = formatRupiah(biaya_titip.toString());

        var ket_biaya_titip = 'Total B.Titip : Rp. '+biaya_titip+' ('+waktu_ke+' '+satuan_waktu+')';
        $('#keterangan_total_bt').html(ket_biaya_titip);

        let checked = '';
        $('input[type=checkbox]').each(function () {
            if (this.checked){
                sum_checked = $(this).val();
            }           
        });
        sum_checked = Number(sum_checked);
        
        // for if click checkbox, so next checkbox remove checklist and disabled
        if(sum_checked > value){
            let i = value + 1;
            for(i; i <= until; i++){
                let checkbox = '';
                checkbox = checkbox + '<input id="checkbox'+i+'" type="checkbox" class="checkbox'+i+'" disabled value="'+i+'" onCLick="condition_disabled('+i+')">';
                checkbox = checkbox + '<label for="checkbox'+i+'" class="checkbox'+i+'">';
                checkbox = checkbox + i;
                checkbox = checkbox + '</label>';

                $('.checkbox-'+i).empty();
                $('.checkbox-'+i).html(checkbox);
            }
        }else{
            // condition if thix checkbox not checklist, can next chexkbox disabled
            if($('#checkbox'+selanjutnya).attr('disabled')){
                $('#checkbox'+selanjutnya).removeAttr('disabled');
            }else{
                $('#checkbox'+selanjutnya).prop('disabled', true);
            }

        }
    }

    function bayar()
    {
        var from            = $('.from_checkbox').val()
        var id_akad         = $('.id_akad').val()
        var nominal         = $('.nominal_total').val()
        var format_nominal  = formatRupiah(nominal.toString())
        // 'pendukung tombol pelunasan
        var type_button     = $('.type_button').val()
        var nilai_pencairan = $('.nilai_pencairan').val()

        // 'agar bisa memasukkan hanya nilai biaya titip'
        if(type_button == 'pelunasan'){
            nominal = nominal - nilai_pencairan;
        }

        // 'untuk mendapatkan nilai checkbox yang tercentang'
        var until = '';
        $('input[type=checkbox]').each(function () {
            if (this.checked){
                until = $(this).val();
            }           
        });

        swal({
            title: "Mengingatkan!",
            text: 'Yakin melakukan pembayaran sebesar Rp. '+format_nominal+' ?',
            icon: "warning",
            // showCancelButton: true,
            // confirmButtonClass: "btn-danger",
            buttons: ["Tidak", "Ya"],
            cancel: true,
            confirm: true,
        }).then((action) => {
            if (action) {
                $.ajax({
                    url: '{{url("akad/ajax/bayar-akad")}}',
                    type: 'GET',
                    cache: false,
                    data:{
                        from:from, 
                        until:until,
                        id_akad:id_akad, 
                        type:type_button,
                        bt_7_hari:nominal, 
                        nilai_pencairan:nilai_pencairan,
                    },
                    success:function(result){	
                        // console.log(result);

                        swal("Pembayaran Biaya Titip Telah Berhasil", {
                            icon: "success",
                        });

                        window.location.href = '{{route("akad.nasabah-akad")}}';
                    },
                    error:function(xhr, ajaxOptions, thrownError){
                        console.log(thrownError)
                    }
                });
            }else {
                swal({
                    title: "Pemberitahuan",
                    text: "Oke, jika sudah benar silahkan klik tombol bayar",
                    icon: "warning",
                });
            }
        });
    }

    // type is between pelunasan and biaya titip
    function akad_prosedur(id, type)
    {
        $.ajax({
            url: '{{url("akad/ajax/fetch-data")}}',
            type: 'GET',
            cache: false,
            data:{id:id},
            success:function(result){
                if(type == 'pelunasan' || type == 'biaya_titip'){
                    modal_prosedur(result, type)
                }else if(type == 'akad_ulang'){
                    modal_akad_ulang(result, type)
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log(thrownError)
            }
        });
    }

    // type is between pelunasan and biaya titip
    function modal_prosedur(data, type)
    {
        var from, until;

        console.log(data);

        // condition show/hide word Rp on some item
        $.each(data, function(index, item){
            var name = '.'+index;
            var value;

            if(index == 'bt_terbayar' || index == 'bt_tertunggak'){
                value = 'Rp. '+item;
            }else{
                value = item;
            }

            $(name).html(': '+value) 
        });

        // condition word 'harian' or 'mingguan'
        if(data.opsi_pembayaran == 1){
            var satuan_waktu = 'Hari';
        }else if(data.opsi_pembayaran == 7 || data.opsi_pembayaran == 15){
            var satuan_waktu = 'Minggu';
        }

        $('#keterangan_waktu_ke').html('Pembayaran '+satuan_waktu+' Ke:')

        var keterangan = 'Total : Rp. 0 (0 '+satuan_waktu+')'
        $('#keterangan_total_bt').html(keterangan)

        // 'status tertunggak == 1 di anggap lunas'
        if(data.status_tunggakan == 1){
            from = 0;
            until = 0;
        }else if (data.status_tunggakan == 0){
            from = data.waktu_sudah + 1;
            until = data.waktu_sudah + data.waktu_tertunggak;
        }

        if(type == 'pelunasan'){
            total_pelunasan(data, from, until)
        }

        //set value
        $('.type_button').val(type)
        $('.from_checkbox').val(from)
        $('.until_checkbox').val(until)
        $('.id_akad').val(data.id_akad)
        $('.bt_7_hari').val(data.bt_7_hari);
        $('.default_until_checkbox').val(until)
        $('.nilai_pencairan').val(data.nilai_pencairan)
        $('.opsi_pembayaran').val(data.opsi_pembayaran)

        // show checkbox base on time done pay and not yet pay
        execution_checkbox(from, until, type)
    }

    function total_pelunasan(data, from, until)
    {
        var bt_tertunggak   = Number(data.bt_tertunggak_biasa);
        var nilai_pencairan = Number(data.nilai_pencairan);
        // 'rumus total di pelunasan'
        var total = nilai_pencairan + bt_tertunggak;
        var format_total = formatRupiah(total.toString());

        // this class show when button 'pelunasan' active
        $('.total').html(': Rp. '+format_total);
        $('.nominal_total').val(total);

        if(data.opsi_pembayaran == 1){
            var satuan_waktu = 'Hari';
        }else if(data.opsi_pembayaran == 7 || data.opsi_pembayaran == 15){
            var satuan_waktu = 'Minggu';
        }

        // 'jika from == 0, maka status tunggakan di anggap lunas'
        waktu_ke = from == 0 ? 0 : (until + 1) - from;
        bt_tertunggak = formatRupiah(bt_tertunggak.toString());

        var keterangan_bt = 'Total B.Titip : Rp. '+bt_tertunggak+' ('+waktu_ke+' '+satuan_waktu+')';
        $('#keterangan_total_bt').html(keterangan_bt);

        var keterangan = 'Total Pembayaran : Rp. '+format_total;
        $('#keterangan_total').html(keterangan);
    }

    // type is between 'pelunasan' and 'biaya titip'
    function execution_checkbox(from, until, type)
    {
        var i           = from;
        var checked     = type == 'pelunasan' ? 'checked' : '';
        var disabled    = '';
        var checkbox    = '';

        // console.log(from, until)

        // 'agar jika sudah lunas biaya titip, maka tidak muncul checkbox'
        if(from > 0){
            for (i; i <= until; i++) {
                // condition if type is 'pelunasan' all checkbox checklist
                if(type == 'biaya_titip'){
                    if(i > from){
                        disabled = 'disabled';
                    }
                }else if(type == 'pelunasan'){
                    disabled = '';
                }

                checkbox = checkbox + '<div class="checkbox-color checkbox-success checkbox-'+i+'">';
                checkbox = checkbox + '<input id="checkbox'+i+'" type="checkbox" class="checkbox'+i+'" '+checked+' '+disabled+' value="'+i+'" onCLick="condition_disabled('+i+')">';
                checkbox = checkbox + '<label for="checkbox'+i+'" class="checkbox'+i+'">';
                checkbox = checkbox + i;
                checkbox = checkbox + '</label>';
                checkbox = checkbox + '</div>'; 
            }

            $('.checkbox').html(checkbox);
        }else{
            $('.checkbox').empty();
        }
    }

    //'TOMBOL AKAD ULANG'
    function akad_ulang(id)
    {
        $('#modal-akad-ulang').modal('show')

        // 'untuk mendapatkan data akad terlebih dahulu'
        akad_prosedur(id, 'akad_ulang')
    }

    function modal_akad_ulang(data, type)
    {
        console.log(data)

        $.each(data, function(index, item){
            kondisi_jenis_barang(index, item);

            var name = '.data-'+index;

            if(index == 'nilai_tafsir'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'nilai_pencairan'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
                $('.data-penyusutan').val(item)
            }else if(index == 'biaya_titip' || index == 'jml_bt_yang_dibayar'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'biaya_admin'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'tanggal_lahir' || index == 'tanggal_akad'){
                $(name).text(': '+moment(item).format('DD-MM-Y'));
            }else if(index == 'tanggal_jatuh_tempo'){
                // action in function 'tanggal jaltuh tempo' below
            }else if(index == 'bt_tertunggak'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
            }else{
                $(name).text(': '+item);
                // for set default value note* don't remove this.
                $(name).val(item);
            }
        });
        $('.default-biaya_admin').val(data.biaya_admin);
        $('.default-bt_tertunggak').val(data.bt_tertunggak);

        keyup_penyusutan();
        opsi_pembayaran(data.opsi_pembayaran);
        jangka_waktu_akad(data.jangka_waktu_akad);
        tanggal_jatuh_tempo(data.jangka_waktu_akad, 'default');
    }

    function tanggal_jatuh_tempo(waktu, option)
    {
        var tanggal_jatuh_tempo = moment().add(waktu, 'days').format('DD-MM-Y');

        $('.data-tanggal_jatuh_tempo').text(': '+tanggal_jatuh_tempo);
    }

    function kondisi_jenis_barang(title, value)
    {
        if(value == 'Kendaraan'){
            var barang_satu = 'KT';
            var barang_dua = 'Warna';
            var barang_tiga = 'Nomor Rangka';
        }else if(value == 'Elektronik'){
            var barang_satu = 'Type';
            var barang_dua = 'Merk';
            var barang_tiga = 'Imei / Nomor Serial';
        }

        $('.name-kelengkapan_barang_satu').html(barang_satu);
        $('.name-kelengkapan_barang_dua').html(barang_dua);
        $('.name-kelengkapan_barang_tiga').html(barang_tiga);
    }


    function opsi_pembayaran(value)
    {
        // if 'opsi pembayaran' default value
        $('.op_'+value).prop('checked', true);
        // if 'opsi pembayaran' onClick 
        $('.data-opsi_pembayaran').val(value);
        biaya_titip(value, 'opsi_pembayaran');
    } 

    function jangka_waktu_akad(value)
    {
        // jwa is 'jangka waktu akad'
        $('.jwa_'+value).prop('selected', true);

        $('.data-jangka_waktu_akad').val(value);

        $('#jangka_waktu_akad').change(function(){
            var waktu = $(this).children("option:selected").val();
            
            tanggal_jatuh_tempo(waktu, 'pilih_jangka_waktu_akad');
        });
    }

    function keyup_penyusutan()
    {
        $('.penyusutan').on('keyup', function(){
            this.value = formatRupiah(this.value);  

            var penyusutan = this.value.replace(",","").replace(".","").replace(".","").replace(".","").replace(".","");
            penyusutan = penyusutan == 0 ? 0 : penyusutan;

            $('.data-penyusutan').val(penyusutan);
            biaya_titip(penyusutan, 'penyusutan');
        });        
    }

    // value == 'nilai penyusutan'
    // option between 'penyusutan' and 'opsi pembayaran'
    function biaya_titip(value, option)
    {        
        // 'margin == persenan'
        var margin              = $('.data-margin').val() / 100;
        var potongan            = $('.data-potongan').val();
        var tunggakan           = $('.default-bt_tertunggak').val().replace(".", "").replace(".", "");
        tunggakan               = Number(tunggakan);
        var biaya_admin         = $('.default-biaya_admin').val().replace("Rp", "").replace(".", "").replace(".", "");
        biaya_admin             = Number(biaya_admin);

        if(option == 'penyusutan'){
            var penyusutan      = value;
        }else{
            var penyusutan      = $('.data-penyusutan').val();
        }
        penyusutan = Number(penyusutan);

        if(option == 'opsi_pembayaran'){
            var opsi_pembayaran = value;
        }else{
            var opsi_pembayaran = $('.data-opsi_pembayaran').val();
        }

        if(opsi_pembayaran == 1){
            var biaya_titip = (penyusutan * margin - potongan) / 2 / 7;
        }else if(opsi_pembayaran == 7){
            var biaya_titip = (penyusutan * margin - potongan) / 2;
        }else if (opsi_pembayaran == 15){
            var biaya_titip = penyusutan * margin ;
        }

        // condition for negatif number of 'biaya titip'
        biaya_titip = biaya_titip <= 0 ? 0 : biaya_titip;

        if(biaya_titip >= 1000 && biaya_titip != 0){
            thousand_bt             = 1000;
        }else{
            thousand_bt             = 1;
        }

        biaya_titip     = format_nominal(biaya_titip);
        biaya_titip     = biaya_titip.replace("Rp", "");
        biaya_titip     = Math.ceil(biaya_titip) * thousand_bt;
        biaya_titip     = Number(biaya_titip);
        var nominal_biaya_titip     = formatRupiah(biaya_titip.toString());

        $('.data-nominal_biaya_titip').html(': Rp.'+nominal_biaya_titip);

        var total = penyusutan + biaya_titip + biaya_admin + tunggakan;
        total = formatRupiah(total.toString());
        $('.total_pembayaran').html(': Rp.'+total);
    }

    function info_wali()
    {
        let form_wali       = $('#table-wali');
        let checkbox_wali   = $('#checkbox_wali');

        if(checkbox_wali.val() == 0){
            form_wali.css('display', '');

            checkbox_wali.val(1);
        }else{
            form_wali.css('display', 'none');

            checkbox_wali.val(0);
        }

        console.log(checkbox_wali.val());
    }

    //'TOMBOL AKAD LELANG'
    function lelang(id)
    {
        $('#modal-lelang').modal('show');
    }
</script>