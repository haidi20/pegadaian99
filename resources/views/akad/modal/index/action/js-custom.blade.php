<script>
    function review(id)
    {
        $('#modal-review-na').modal('show');
        
        // for close popover on button "kwitansi biaya titip"
        $('[data-toggle="popover"]').popover('hide');

        fetch_data(id, 'review');
    }

    function edit(id)
    {
        $('#modal-edit').modal('show');
    }

    // type is between function review and edit
    function fetch_data(id, type)
    {
        $.ajax({
            url: '{{url("akad/ajax/fetch-data")}}',
            type: 'GET',
            cache: false,
            data:{id:id},
            success:function(result){		
                console.log(result)

                modal_review(result)
            },
            error:function(xhr, ajaxOptions, thrownError){
                console.log(thrownError)
            }
        });
    }

    function modal_review(data)
    {
        $.each(data, function(index, item){
            var name = '.'+index;
            var value;

            if(index == 'tanggal_lahir' || index == 'tanggal_daftar'){
                item = item.toString();
                value = moment(item).format('DD-MM-Y');
            }else if(index == 'tanggal_akad' || index == 'tanggal_jatuh_tempo'){
                item = item.toString();
                value = moment(item).format('DD-MM-Y');
            }else{
                value = item;
            }

            $(name).html(value) 
        });
    }
</script>