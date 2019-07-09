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

    function bayar_bt_pelunasan()
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
            title: "Peringatan!",
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
        var input_wali      = $('.checkbox-wali input');
        var table_wali      = $('#table-wali');
        var checkbox_wali   = $('.checkbox-wali');
        var html_input_wali = '<input type="checkbox" name="checkbox_wali" id="checkbox_wali" value="0" onClick="info_wali()">';

        $('#modal-akad-ulang').modal('show');

        // first remove tag input 'nasabah wali'
        input_wali.remove();
        // add tag input for checkbox 'nasabah wali'
        checkbox_wali.prepend(html_input_wali);
        // can default form 'nasabah wali' hide
        table_wali.css('display', 'none');

        condition_step_au();
        empty_form_wali();

        // 'untuk mendapatkan data akad terlebih dahulu'
        akad_prosedur(id, 'akad_ulang');
    }

    function empty_form_wali()
    {
        var name_form_wali = [
            'nama_lengkap', 'alamat', 'kota', 'no_telp', 'no_identitas',
        ];

        for(var i = 0; i <= name_form_wali.length; i++){
            $('#'+name_form_wali[i]).val('');
        }
    }

    //au is 'akad ulang'
    function action_au(type)
    {
        var check           = $('.form-akad-ulang')[0];
        var show_swal       = '';
        var checkbox_wali   = $('#checkbox_wali').val();

        // condition if checkbox active and then some form empty, can show notif
        condition_form_wali(type, check, checkbox_wali);
    }

    function condition_form_wali(type, check, checkbox_wali)
    {
        if(type == 'next'){
            if(checkbox_wali == 1){
                if(!check.checkValidity()){
                    check.reportValidity();
                    show_swal = 0;
                }else{
                    show_swal = 1;
                }
            }else{
                show_swal = 1;
            }
        }else if(type == 'previous'){
            show_swal = 0;
        }

        if(show_swal == 1){
            swal({
                title: "Peringatan!",
                text: 'Anda yakin data sudah benar ?',
                icon: "warning",
                // showCancelButton: true,
                // confirmButtonClass: "btn-danger",
                buttons: ["Tidak", "Ya"],
                cancel: true,
                confirm: true,
            }).then((action) => {
                if (action) {
                    // if type is next
                    condition_step_au(type);
                }else {
                    swal({
                        title: "Pemberitahuan!",
                        text: "Oke, jika sudah benar silahkan klik tombol bayar",
                        icon: "success",
                    });
                }
            });
        }

        if(type == 'previous'){
            condition_step_au(type);
        }
    }

    function condition_step_au(type = null)
    {
        var exit            = $('#exit');
        var next            = $('#next');
        var previous        = $('#previous');
        var step_one        = $('.step-one');
        var step_two        = $('.step-two');
        var checkbox_wali   = $('#checkbox_wali');
        var step_one_wali   = $('.step-one-wali');
        
        if(type == 'next'){
            next.hide();
            previous.show();
            step_two.show();
            step_one.hide();
            step_one_wali.hide();
        }else if(type == 'previous' || type == null){
            next.show();
            previous.hide();
            step_two.hide();
            step_one.show();

            if(checkbox_wali.val() == 0){
                step_one_wali.hide();
            }else if(checkbox_wali.val() == 1){
                step_one_wali.css('display', '');
            }
        }
    }

    function modal_akad_ulang(data, type)
    {
        console.log(data);

        $.each(data, function(index, item){
            var name = '.data-'+index;

            if(index == 'nilai_tafsir' || index == 'nilai_pencairan'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'biaya_titip' || index == 'jml_bt_yang_dibayar'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'tanggal_lahir' || index == 'tanggal_akad'){
                $(name).text(': '+moment(item).format('DD-MM-Y'));
            }else if(index == 'bt_tertunggak' || index == 'biaya_admin'){
                $(name).text(': Rp.'+formatRupiah(item.toString()));
            }else{
                item = item == null ? '-' : item;
                $(name).text(': '+item);
                // for set default value note* don't remove this.
                $(name).val(item);
            }

            kondisi_jenis_barang(index, item);
        });
        $('.data-id_akad').val(data.id_akad);
        $('.default-biaya_admin').val(data.biaya_admin);
        $('.default-bt_tertunggak').val(data.bt_tertunggak);
        $('#penyusutan').val('');
        $('.data-sisa_pinjaman').val(data.nilai_pencairan);
        $('.data-sisa_pinjaman').text(': Rp. '+formatRupiah(data.nilai_pencairan));

        // 'setiap membuka akad ulang opsi pembayaran 15 terbuka'
        if(data.jangka_waktu_akad <= 7){
            $('#op_15').hide();
        }else{
            $('#op_15').show();
        }

        payment_option(data.opsi_pembayaran);
        bt_yang_dibayar();
        keyup_penyusutan(data.nilai_pencairan);
        jangka_waktu_akad(data.jangka_waktu_akad);
        tanggal_jatuh_tempo(data.jangka_waktu_akad, 'default');
        bt_yang_dibayar(data, 'default');
        condition_button_pay('disabled');
    }

    function tanggal_jatuh_tempo(waktu, option)
    {
        var tanggal_jatuh_tempo = moment().add(waktu, 'days');

        $('.data-tanggal_jatuh_tempo').text(': '+tanggal_jatuh_tempo.format('DD-MM-Y'));
        $('.data-tanggal_jatuh_tempo').val(tanggal_jatuh_tempo.format('Y-MM-DD'));
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

    function jangka_waktu_akad(value)
    {
        // jwa is 'jangka waktu akad'
        $('.jwa_'+value).prop('selected', true);

        $('#jangka_waktu_akad').change(function(){
            var waktu = $(this).children("option:selected").val();

            $('.data-jangka_waktu_akad').val(waktu);
            
            tanggal_jatuh_tempo(waktu, 'pilih_jangka_waktu_akad');

            payment_option(waktu, 'jangka_waktu_akad');

            bt_yang_dibayar(waktu, 'jangka_waktu_akad');
        });
    }

    // option between 'jangka waktu akad' and 'default'
    function click_payment_option(value, option = null)
    {
        // if 'opsi pembayaran' default value
        $('.op_'+value).prop('checked', true);

        // if 'opsi pembayaran' onClick 
        $('.data-opsi_pembayaran').val(value);

        biaya_titip(value, 'opsi_pembayaran');

        bt_yang_dibayar(value, 'opsi_pembayaran');

        //'PENTING untuk JUMLAH BIAYA TITIP YANG DIBAYAR'
        // 'ketika bt yg dibayar jadi 0'
        // 'maka jumlah bt yg dibayar menjadi 0'
        $('.jml_bt_yang_dibayar').html(': Rp. 0');
        $('.data-jml_bt_yang_dibayar').val(0);

        // console.log( 'ketika click op, bilai bt = '+$('.data-bt_yang_dibayar').val())
    }

    // option is 'default' or 'jangka waktu akad'
    function payment_option(value, option = null)
    {
        if(option == 'jangka_waktu_akad'){
            if(value == 7){
                $('#op_15').hide();
                // 'agar yg checked yg berdasarkan di pilih'
                // $('.data-opsi_pembayaran').val(value);
                // $('#op_'+value+' label input').prop('checked', true)
            }else{
                $('#op_15').show();
            }
        }

        if(value != 30 && value != 60){
            $('#op_'+value+' label input').prop('checked', true)
            $('.data-opsi_pembayaran').val(value);

            biaya_titip(value, 'opsi_pembayaran');

            bt_yang_dibayar(value, 'opsi_pembayaran');
        }        
    } 

    function keyup_penyusutan(nilai_pencairan)
    {
        $('.penyusutan').on('keyup', function(){
            this.value = formatRupiah(this.value);  

            var penyusutan = this.value.replace(",","").replace(".","").replace(".","").replace(".","").replace(".","");
            penyusutan = penyusutan == 0 ? 0 : penyusutan;

            var number_penyusutan      = Number(penyusutan);
            var number_nilai_pencairan = Number(nilai_pencairan);

            //condition button pay
            // condition if 'penyusutan' empty button pay disable
            // condition if 'jumlah biaya 
            if(number_penyusutan > 0){
                if(number_penyusutan <= number_nilai_pencairan){
                    condition_button_pay('active');
                }else{
                    condition_button_pay('disabled');
                }
            }else{
                condition_button_pay('disabled');
            }

            var sisa_pinjaman = nilai_pencairan - penyusutan;
            $('.data-nominal_total').val(sisa_pinjaman);
            var negative = condition_negative(sisa_pinjaman);
            var nominal_sisa_pinjaman = formatRupiah(sisa_pinjaman.toString());

            $('.data-sisa_pinjaman').text(': Rp. '+negative+nominal_sisa_pinjaman);
            $('.data-sisa_pinjaman').val(sisa_pinjaman);
            $('.data-penyusutan').val(penyusutan);
            $('#bt_yang_dibayar>option:eq(0)').prop('selected', true);

            var data = {
                penyusutan,
                sisa_pinjaman
            }

            biaya_titip(data, 'sisa_pinjaman');
        });        
    }

    // 'jika sisa pinjaman menjadi nominalnya positif atau negatif'
    // 
    function condition_negative(sisa_pinjaman)
    {
        if(sisa_pinjaman > 0){
            $('.data-sisa_pinjaman').css('color', 'black');
            return '';
        }else{
            $('.data-sisa_pinjaman').css('color', 'red');
            return '-';
        }
    }

    // 'kondisi tombol bayar untuk bisa aktif atau terkunci'
    // option between active and disabled
    function condition_button_pay(option)
    {
        if(option == 'active'){
            $('.bayar').removeClass('disabled');
        }else if(option == 'disabled'){
            $('.bayar').addClass('disabled');
        }
    }

    // option is 'jangka waktu akad, opsi pembayaran, dan default' 
    function bt_yang_dibayar(value = null, option = null)
    {
        var maks        = '';
        var tagOptions  = [];

        if(option == 'default'){
            // condition if 'biaya titip yang dibayar' choose value number
            $('#bt_yang_dibayar').change(function(){
                var value = $(this).children("option:selected").val();

                // determine 'biaya titip'
                biaya_titip(value, 'bt_yang_dibayar');

                $('.data-bt_yang_dibayar').val(value);
            });
        }

        if(option == 'jangka_waktu_akad'){
            var jangka_waktu_akad = value;
        }else if(option == 'default'){
            var jangka_waktu_akad = value.jangka_waktu_akad;
        }else{
            var jangka_waktu_akad = $('.data-jangka_waktu_akad').val();
        }

        if(option == 'opsi_pembayaran'){
            var opsi_pembayaran = value;
        }else if(option == 'default'){
            var opsi_pembayaran = value.opsi_pembayaran;
        }else{
            var opsi_pembayaran = $('.data-opsi_pembayaran').val();
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
                $('.data-bt_yang_dibayar').val(0);
            }else{
                tagOptions = tagOptions + '<option value="'+i+'">'+i+'</option>';
            }
        }

        $('#bt_yang_dibayar').html(tagOptions);
    }

    // value == 'nilai sisa_pinjaman, opsi pembyaran, dan biaya titip yang dibayar'
    // option between 'sisa_pinjaman, opsi pembayaran dan biaya titip yang dibayar'
    function biaya_titip(value, option)
    {        
        // 'margin == persenan'
        var margin              = $('.data-margin').val() / 100;
        var potongan            = $('.data-potongan').val();
        var tunggakan           = $('.default-bt_tertunggak').val().replace(".", "").replace(".", "");
        tunggakan               = Number(tunggakan);
        var biaya_admin         = $('.default-biaya_admin').val().replace("Rp", "").replace(".", "").replace(".", "");
        biaya_admin             = Number(biaya_admin);

        if(option == 'sisa_pinjaman'){
            var penyusutan          = value.penyusutan;
            var sisa_pinjaman       = value.sisa_pinjaman;
        }else{
            var penyusutan          = $('.data-penyusutan').val();
            var sisa_pinjaman       = $('.data-sisa_pinjaman').val();
        }
        penyusutan      = Number(penyusutan);
        sisa_pinjaman   = Number(sisa_pinjaman);

        if(option == 'opsi_pembayaran'){
            var opsi_pembayaran = value;
        }else{
            var opsi_pembayaran = $('.data-opsi_pembayaran').val();
            console.log('dapat dari data-');
        }
        console.log('opsi_pembayaran = '+opsi_pembayaran);

        if(option == 'bt_yang_dibayar'){
            var bt_yang_dibayar = value;
        }else{
            var bt_yang_dibayar = $('.data-bt_yang_dibayar').val();
        }

        if(opsi_pembayaran == 1){
            var biaya_titip = (sisa_pinjaman * margin - potongan) / 2 / 7;
        }else if(opsi_pembayaran == 7){
            var biaya_titip = (sisa_pinjaman * margin - potongan) / 2;
        }else if (opsi_pembayaran == 15){
            var biaya_titip = sisa_pinjaman * margin ;
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

        // 'rumus jumlah biaya titip yang dibayar'
        var jml_bt_yang_dibayar = biaya_titip * bt_yang_dibayar
        $('.data-jml_bt_yang_dibayar').val(jml_bt_yang_dibayar);

        var nominal_biaya_titip     = formatRupiah(biaya_titip.toString());

        $('.data-nominal_biaya_titip').html(': Rp.'+nominal_biaya_titip);

        
        var total = penyusutan + jml_bt_yang_dibayar + biaya_admin + tunggakan;
        $('.data-nominal_total').val(total);
        total = formatRupiah(total.toString());
        $('.total_pembayaran').html(': Rp.'+total);

        format_jml_bt_yang_dibayar     = formatRupiah(jml_bt_yang_dibayar.toString());
        $('.jml_bt_yang_dibayar').html(': Rp. '+format_jml_bt_yang_dibayar);
    }

    function info_wali()
    {
        var form_wali       = $('#table-wali');
        var checkbox_wali   = $('#checkbox_wali');

        var checkbox_wali_value   = $('.checkbox_wali_value');

        if(checkbox_wali.val() == 0){
            form_wali.css('display', '');

            checkbox_wali.val(1);
            checkbox_wali_value.val(1);
        }else{
            form_wali.css('display', 'none');

            checkbox_wali.val(0);
            checkbox_wali_value.val(0);
        }
    }

    function bayar_akad_ulang()
    {
        var data                    = $('.form-akad-ulang').serializeArray(); 
        var total                   = $('.data-nominal_total').val();
        var format_total            = formatRupiah(total.toString());
        var modal_akad_ulang        = $('#modal-akad-ulang');
        var modal_akad_ulang_confirm= $('#modal-akad-ulang-confirm');

        $.each(data, function(index, item){
            console.log(item);

            insert_data_wali_nasabah(item);

            insert_data_barang_au(item);
        });       

        //condition show/hide modal 'akad ulang' and modal confirm 'akad ulang'
        modal_akad_ulang.modal('hide');
        modal_akad_ulang_confirm.modal('show');
        // modal_akad_ulang.on('hidden.bs.modal', function(){
        //     modal_akad_ulang_confirm.modal('show');
        // });

        
    }

    function insert_data_wali_nasabah(data)
    {
        // 'alamat tidak menggunakan ":" '
        if(data.name == 'alamat'){
            $('.data-wali_'+data.name).text(data.value);
        }else{
            $('.data-wali_'+data.name).text(': '+data.value);
        }
        
        // for condition data 'wali nasabah'
        if(data.name == 'checkbox_wali' && data.value == 1){
            $('.table-detail-wali-au').show();
        }else if(data.name == 'checkbox_wali' && data.value == 0){
            $('.table-detail-wali-au').hide();
        }
    }

    function insert_data_barang_au(data)
    {
        $('.data-dinamis-'+data.name).text(': '+data.value);
    }
    
    function button_back_confirm_au(option = null)
    {
        var modal_akad_ulang        = $('#modal-akad-ulang');
        // var modal_akad_ulang_confirm= $('#modal-akad-ulang-confirm');
        var id = $('.data-id_akad').val();

        // akad_ulang(id);

        // modal_akad_ulang_confirm.modal('hide');
        // modal_akad_ulang_confirm.on('hidden.bs.modal', function(){
            modal_akad_ulang.modal('show');
        // });
    }

    function close_all_modal()
    {

        var modal_akad_ulang        = $('#modal-akad-ulang');
        var modal_akad_ulang_confirm= $('#modal-akad-ulang-confirm');

        modal_akad_ulang_confirm.modal('hide');
        modal_akad_ulang.modal('hide');
        // $('#modal-akad-ulang-confirm').on('hidden', function(){ 
        //     $(this).empty(); 
        // });
    }

    //'TOMBOL AKAD LELANG'
    function lelang(id)
    {
        $('#modal-lelang').modal('show');
    }

    // swal({
    //         title: "Peringatan!",
    //         text: 'Yakin melakukan pembayaran sebesar Rp. '+format_total+' ?',
    //         icon: "warning",
    //         // showCancelButton: true,
    //         // confirmButtonClass: "btn-danger",
    //         buttons: ["Tidak", "Ya"],
    //         cancel: true,
    //         confirm: true,
    //     }).then((action) => {
    //         if (action) {
    //             $.ajax({
    //                 url: '{{url("akad/ajax/bayar-akad-ulang")}}',
    //                 type: 'GET',
    //                 cache: false,
    //                 data:{
    //                     data:data,
    //                 },
    //                 success:function(result){	
    //                     console.log(result);

    //                     // swal("Pembayaran Biaya Titip Telah Berhasil", {
    //                     //     icon: "success",
    //                     // });

    //                     // window.location.href = '{{route("akad.nasabah-akad")}}';
    //                 },
    //                 error:function(xhr, ajaxOptions, thrownError){
    //                     console.log(thrownError)
    //                 }
    //             });
    //         }else {
    //             swal({
    //                 title: "Pemberitahuan",
    //                 text: "Oke, jika sudah benar silahkan klik tombol bayar",
    //                 icon: "warning",
    //             });
    //         }
    //     });
</script>