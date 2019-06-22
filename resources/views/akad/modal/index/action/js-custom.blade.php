<script>
    $(function(){
        $('.nilai_pencairan').on('keyup' ,function(){
            this.value = formatRupiah(this.value)
        });
    });

    function review(id, type)
    {        
        // for close popover on button "kwitansi biaya titip"
        $('[data-toggle="popover"]').popover('hide');

        // for condition active base on button on table. between type is review or 'biaya titip'
        condition_tab(type);

        // for empty data in table 'biaya titip'
        $('#table_biaya_titip').empty();
        $('#table_rincian_akad').empty();   

        akad_action(id, 'review');

        $('#modal-review').modal('show');
    }

    function condition_tab(type)
    {
        if(type == 'biaya_titip'){
            type = 'bea-titip';
        }else if(type == 'review'){
            type = 'detail-nasabah';
        }

        var tab = ['detail-nasabah', 'data-akad', 'bea-titip', 'rincian-akad', 'maintenance'];

        for(var i = 0; i < tab.length; i++){
            if(tab[i] == type){
                $('#tab-'+type).addClass('active');
                $('#name-tab-'+type).addClass('active');
            }else{
                $('#tab-'+tab[i]).removeClass('active');
                $('#name-tab-'+tab[i]).removeClass('active');
            }
        }
    }

    function edit_akad(id)
    {
        akad_action(id, 'edit');

        $('#modal-edit').modal('show');
    }

    // type is between function review and edit
    function akad_action(id, type)
    {
        $.ajax({
            url: '{{url("akad/ajax/fetch-data")}}',
            type: 'GET',
            cache: false,
            data:{id:id},
            success:function(result){		
                console.log(result)

                if(type == 'review'){
                    modal_review(result)
                    fetch_data_biaya_titip(result)
                }else if(type == 'edit'){
                    form_edit_akad(result)
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log(thrownError)
            }
        });
    }

    function form_edit_akad(data)
    {
        $.each(data, function(index, item){
            var name = '.'+index;

            if(index == 'nilai_pencairan'){
                item = formatRupiah(item)
            }

            $(name).val(item) 
        });
    }

    function modal_review(data)
    {
        var keterangan;

        $.each(data, function(index, item){
            var name = '.'+index;
            var value;

            if(index == 'tanggal_lahir' || index == 'tanggal_daftar'){
                item = item.toString();
                value = moment(item).format('DD-MM-Y');
            }else if(index == 'tanggal_akad' || index == 'tanggal_jatuh_tempo'){
                item = item.toString();
                value = moment(item).format('DD-MM-Y');
            }else if(index == 'maintenance'){
                value = item == 0 ? 'Belum Di Periksa' : 'Sudah Di Periksa';
            }else{
                value = item;
            }

            $(name).html(value) 
        });

        //condition for 'keterengan opsi pembayaran'
        if(data.opsi_pembayaran == 1){
            keterangan = 'Biaya Titp Per Hari';
        }else if(data.opsi_pembayaran == 7 || data.opsi_pembayaran == 15){
            keterangan = 'Biaya Titp Per '+data.opsi_pembayaran+' Hari';
        }

        $('.keterangan_opsi_pembayaran').text(keterangan);
    }

    function fetch_data_biaya_titip(data)
    {
        $.ajax({
            url: '{{url("akad/ajax/fetch-data-biaya-titip")}}',
            type: 'GET',
            cache: false,
            data:{no_id:data.no_id},
            success:function(result){	
                table_bea_titip(result)
                table_rincian_akad(result, data)
            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log(thrownError)
            }
        });
    }

    function table_bea_titip(data)
    {
        var table = '';

        $.each(data, function(index, item){
            var pembayaran = formatRupiah(item.pembayaran)
            var tanggal_pembayaran = moment(item.tanggal_pembayaran).format('DD-MM-Y');

            table = table + '<tr>';
            table = table + '<td>'+item.no_id+'</td>';
            table = table + '<td>'+tanggal_pembayaran+'</td>';
            table = table + '<td>'+item.keterangan+'</td>';
            table = table + '<td> Rp. '+pembayaran+'</td>';
            table = table + '<td><i class="zmdi zmdi-print" title="Bukti Pembayaran"></i></td>';
            table = table + '</tr>';
        });

        $('#table_biaya_titip').append(table);
    }

    function table_rincian_akad(data, akad)
    {
        var table = '';
        var total_pembayaran = 0;

        $.each(data, function(index, item){
            var pembayaran = formatRupiah(item.pembayaran)
            var tanggal_pembayaran = moment(item.tanggal_pembayaran).format('DD-MM-Y');

            table = table + '<tr>';
            table = table + '<td>'+akad.nama_lengkap+'</td>';
            table = table + '<td>'+akad.no_id+'</td>';
            table = table + '<td>'+akad.nama_barang+'</td>';
            table = table + '<td>'+akad.nominal_biaya_titip+'</td>';
            table = table + '<td>'+tanggal_pembayaran+'</td>';
            table = table + '<td>'+akad.opsi_pembayaran+'</td>';
            table = table + '<td>'+item.keterangan+'</td>';
            table = table + '<td> Rp. '+pembayaran+'</td>';
            table = table + '</tr>';

            total_pembayaran += Number(item.pembayaran)
        });

        total_pembayaran = formatRupiah(total_pembayaran.toString());

        table = table + '<tr>';
        table = table + '<td colspan="7" align="right">Total </td>';
        table = table + '<td>Rp. '+total_pembayaran+'</td>';
        table = table + '</tr>';

        $('#table_rincian_akad').append(table);
    }

    function send_edit_akad()
    {
        var data = $('#form-edit-akad').serializeArray();
        
        $.ajax({
            url: '{{url("akad/ajax/insert-data")}}',
            type: 'GET',
            cache: false,
            data:{data:data},
            success:function(result){	
                swal("Pembaharuan Data Akad Telah Berhasil", {
                    icon: "success",
                    showConfirmButton: false,
                });

                window.location.href = '{{route("akad.nasabah-akad")}}';
            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log(thrownError)
            }
        });
    }
</script>