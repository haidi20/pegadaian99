<script>

    // type is between pelunasan and biaya titip
    function prosedur(id, type)
    {
        if(type == 'pelunasan'){
            // show word 'total'
            $('#pelunasan').css('display', '')
            // change title modal = 'pelunasan'
            $('.prosedur-title').html('Pelunasan')
            // active button 'bayar'
            $('.bayar').removeClass('disabled')
        }else if(type == 'biaya_titip'){
             // hide word 'total'
            $('#pelunasan').css('display', 'none')
             // change title modal = 'Pembayaran Biaya Titip'
            $('.prosedur-title').html('Pembayaran Biaya Titip')
            // disabled button 'bayar'
            $('.bayar').addClass('disabled')
        }

        $('#modal-prosedur').modal('show');

        if(type == 'biaya_titip'){
            var keterangan = 'Total : Rp. 0 (0 minggu)'
            $('#keterangan_total').html(keterangan)
        }

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
        console.log(checked)
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
        var from            = $('.from_checkbox').val()
        var until           = $('.until_checkbox').val()
        var opsi_pembayaran = $('.opsi_pembayaran').val()

        var selanjutnya = parseInt(value) + 1
        var biaya_titip = $('.bt_7_hari').text()
        var biaya_titip = parseInt(biaya_titip)

        // condition if checkbox nothing checked 'waktu_ke' set value 0
        if($('#checkbox'+from).prop('checked') == true){
            var waktu_ke = value - (from - 1);

            $('.bayar').removeClass('disabled')
        }else{
            var waktu_ke = 0;

            $('.bayar').addClass('disabled')
        }

        // condition if checkbox not checked and then 'melakukan pengurangan pada jumlah waktu dan biaya titip'
        if($('#checkbox'+value).prop('checked') == false){
            if(waktu_ke != 0){
                var nominal = (biaya_titip * waktu_ke) - biaya_titip
                waktu_ke = waktu_ke - 1;
            }else{
                var nominal = 0;
            }
        }else{
            // 'rumus biaya titip dikalikan dengan jumlah hari/minggu di pilih'
            var nominal = biaya_titip * waktu_ke;
        }

        $('.nominal_total').val(nominal)

        nominal = formatRupiah(nominal.toString())

        if($('#checkbox'+selanjutnya).attr('disabled')){
            $('#checkbox'+selanjutnya).removeAttr('disabled')
        }else{
            $('#checkbox'+selanjutnya).prop('disabled', true)
        }

        var keterangan = 'Total : Rp. '+nominal+' ('+waktu_ke+' minggu)'
        $('#keterangan_total').html(keterangan)
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
                    url: '{{url("akad/ajax/bayar-biaya-titip")}}',
                    type: 'GET',
                    cache: false,
                    data:{id_akad:id_akad, bt_7_hari:nominal, from:from, until:until},
                    success:function(result){	
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
                swal("Your imaginary file is safe!");
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
            $('#keterangan_waktu_ke').html('Pembayaran Hari Ke:')
        }else{
            $('#keterangan_waktu_ke').html('Pembayaran Minggu Ke:')
        }

        from = data.waktu_sudah + 1;
        until = data.waktu_sudah + data.waktu_tertunggak;

        if(type == 'pelunasan'){
            total_pembayaran(data, until)
        }

        //set value
        $('.type_button').val(type)
        $('.from_checkbox').val(from)
        $('.until_checkbox').val(until)
        $('.id_akad').val(data.id_akad)
        $('.default_until_checkbox').val(until)
        $('.nilai_pencairan').val(data.nilai_pencairan)
        $('.opsi_pembayaran').val(data.opsi_pembayaran)

        // show checkbox base on time done pay and not yet pay
        execution_checkbox(from, until, type)
    }

    function total_pembayaran(data, waktu_ke)
    {
        var bt_tertunggak   = Number(data.bt_tertunggak_biasa);
        var nilai_pencairan = Number(data.nilai_pencairan);
        // 'rumus total di pelunasan'
        var total = nilai_pencairan + bt_tertunggak;
        var format_total = 'Rp. '+formatRupiah(total.toString())

        $('.total').html(': '+format_total)
        $('.nominal_total').val(total)

        var keterangan = 'Total : '+format_total+' ('+waktu_ke+' minggu)'
        $('#keterangan_total').html(keterangan)
    }

    // type is between 'pelunasan' and 'biaya titip'
    function execution_checkbox(from, until, type)
    {
        var i           = from;
        var checked     = type == 'pelunasan' ? 'checked' : '';
        var disabled    = '';
        var checkbox    = '';

        // console.log(from, until)

        for (i; i <= until; i++) {
            // condition if type is 'pelunasan' all checkbox checklist
            if(type == 'biaya_titip'){
                if(i > from){
                    disabled = 'disabled';
                }
            }else if(type == 'pelunasan'){
                disabled = '';
            }

            checkbox = checkbox + '<div class="checkbox-color checkbox-success checkbox'+until+'">';
            checkbox = checkbox + '<input id="checkbox'+i+'" type="checkbox" class="checkbox'+until+'" '+checked+' '+disabled+' value="'+i+'" onCLick="condition_disabled('+i+')">';
            checkbox = checkbox + '<label for="checkbox'+i+'" class="checkbox'+until+'">';
            checkbox = checkbox + i;
            checkbox = checkbox + '</label>';
            checkbox = checkbox + '</div>'; 
        }

        $('.checkbox').html(checkbox)
    }

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

            if(index == 'nilai_tafsir' || index == 'nilai_pencairan'){
                $(name).html(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'biaya_titip' || index == 'jml_bt_yang_dibayar'){
                $(name).html(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'biaya_admin'){
                $(name).html(': Rp.'+formatRupiah(item.toString()));
            }else if(index == 'tanggal_lahir' || index == 'tanggal_akad' || index == 'tanggal_jatuh_tempo'){
                $(name).html(': '+moment(item).format('DD-MM-Y'));
            }else{
                $(name).html(': '+item);
            }
        });
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
</script>