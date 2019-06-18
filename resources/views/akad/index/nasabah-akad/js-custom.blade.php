<script>
    /*
    * FYI :
    * na    = 'nasabah akad'
    * ajt   = 'akad jatuh tempo'
    * pl    = 'Pelunasan dan Lelang'
    */

    $(document).ready(function() {

        var nameTab = $('.name_tab').val()

        if(nameTab == 'seluruh_data'){
            $('.seluruh_data').addClass('active');
        }

        kondisiOpsiPembayaran(nameTab);

        $('[data-toggle="tooltip"]').tooltip();

        $('[data-toggle="popover"]').popover({
            html: true,
            content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
                // return $('#primary-popover-content').html();
            }
        });
    });

    // for bug class active on tab
    function removeActive(tab)
    {
        var dataTabs = [
            'seluruh_data', 'harian',
            'tujuh_hari', 'lima_belas_hari',
            'ringkasan_harian'
        ];

        for(var i = 0; i < dataTabs.length; i++){
            // console.log(dataTabs[i]);
            $('.name_tab').val(tab)
            if(tab != dataTabs[i]){
                $('#'+dataTabs[i]).removeClass('active');
            }
        }

        kondisiOpsiPembayaran(tab);
    }

    function kondisiOpsiPembayaran(tab)
    {
        if(tab == 'seluruh_data'){
            $('.opsi-pembayaran').show();
            $('.jangka-waktu-akad').show();
        }else{
            $('.opsi-pembayaran').hide();
            $('.jangka-waktu-akad').hide();
        }
    }

    function prosedur(type, id)
    {
        if(type == 'pelunasan'){
            $('#pelunasan').css('display', '')
        }else{
            $('#pelunasan').css('display', 'none')
        }

        fetch_data(id, 'prosedur')

        $('#modal-prosedur').modal('show');
    }

    function customCheckbox(condition)
    {
        var from            = $('.from_checkbox').val()
        var until           = $('.until_checkbox').val()
        var default_until   = parseInt($('.default_until_checkbox').val())

        if(condition == 'add'){
            until++;
            $('.until_checkbox').val(until)

             // show checkbox base on add time and remove time
            executionCheckbox(from, until)
        }

        if(condition == 'delete'){
            if(until > default_until){
                until--;
                $('.until_checkbox').val(until)

                // show checkbox base on add time and remove time
                executionCheckbox(from, until)
            }            
        }
        
        console.log(until, default_until)
    }

    function edit(id)
    {
        $('#modal-edit').modal('show');
    }

    // type is between 'prosedur' and edit
    function fetch_data(id, type)
    {
        $.ajax({
            url: '{{url("akad/ajax/fetch-data")}}',
            type: 'GET',
            cache: false,
            data:{id:id},
            success:function(result){		
                // console.log(result)

                if(type == 'prosedur'){
                    modal_prosedur(result)
                }
            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log(thrownError)
            }
        });
    }

    function modal_prosedur(data)
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

            $(name).html(value)
        });

        // condition base on 'opsi pembayaran'
        if(data.opsi_pembayaran == 1){
             // condition word 'harian' or 'mingguan'
            $('#keterangan_waktu_ke').html('Pembayaran Hari Ke:')

            // condition let i 
            from = data.waktu_sudah + 1;
            until = data.waktu_sudah + data.waktu_tertunggak;
        }else{
             // condition word 'harian' or 'mingguan'
            $('#keterangan_waktu_ke').html('Pembayaran Minggu Ke:')

            // condition let i
            from = data.waktu_sudah + 1;
            until = data.waktu_sudah + data.waktu_tertunggak;
        }

        //set value from and until
        $('.from_checkbox').val(from)
        $('.until_checkbox').val(until)
        $('.default_until_checkbox').val(until)

        // show checkbox base on time done pay and not yet pay
        executionCheckbox(from, until)
    }

    function executionCheckbox(from, until)
    {
        var checkbox = '';
        var i = from;

        //condition disabled
        

        for (i; i <= until; i++) {
            checkbox = checkbox + '<div class="checkbox-color checkbox-success">';
            checkbox = checkbox + '<input id="checkbox'+i+'" type="checkbox" value="'+i+'">';
            checkbox = checkbox + '<label for="checkbox'+i+'">';
            checkbox = checkbox + i;
            checkbox = checkbox + '</label>';
            checkbox = checkbox + '</div>'; 
        }

        console.log(checkbox)

        $('#checkbox').html(checkbox)
    }

    function review()
    {
        $('#modal-review-na').modal('show');
        
        // for close popover on button "kwitansi biaya titip"
        $('[data-toggle="popover"]').popover('hide');
    }
</script>