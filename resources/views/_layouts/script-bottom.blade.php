<!-- Load site level scripts -->

{!! Html::script('avenger/assets/js/jquery-1.10.2.min.js') !!}                          <!-- Load jQuery -->
{!! Html::script('avenger/assets/js/jqueryui-1.9.2.min.js') !!}                             <!-- Load jQueryUI -->

{!! Html::script('avenger/assets/js/bootstrap.min.js') !!}                              <!-- Load Bootstrap -->

{!! Html::script('avenger/assets/plugins/jquery-mousewheel/jquery.mousewheel.min.js') !!} 

{!! Html::script('avenger/assets/plugins/codeprettifier/prettify.js') !!}               <!-- Code Prettifier  -->

{!! Html::script('avenger/assets/plugins/iCheck/icheck.min.js') !!}                         <!-- iCheck -->

{!! Html::script('avenger/assets/js/enquire.min.js') !!}                                    <!-- Enquire for Responsiveness -->

{!! Html::script('avenger/assets/plugins/bootbox/bootbox.js') !!}                           <!-- Bootbox -->

{!! Html::script('avenger/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js') !!} <!-- nano scroller -->

{!! Html::script('avenger/assets/js/application.js') !!}

<!-- End loading site level scripts -->
<!-- Load page level scripts-->

{!! Html::script('avenger/assets/plugins/form-validation/jquery.validate.min.js') !!}  <!-- Validate Plugin -->
    <!-- End loading page level scripts-->

<script src="{{asset('js/app.js')}}" ></script>

<script>
    var submenu = '{{ Request::segment(3) }}';

    $('.btn-delete').click(function() {
        element = $(this);
        url = element.data('url');

        bootbox.confirm({
            message: "Anda yakin akan menghapus data ini?",
            callback: function(result){
                if(result){
                    window.location.href = url;
                }
            }
        });
    });
    
    // $(function(){
    //     if(submenu){
    //         var parent = 'sitemanager/{{ Request::segment(2) }}';
    //         target = $('a[href*="' + parent + '"]').parents('ul:not([data-auto-collapse="false"])');

    //         // target.slideDown();
    //         // target.prev().addClass('active');
    //     }   

    //     $('.icheck input').iCheck({
    //         checkboxClass: 'icheckbox_minimal-blue',
    //         radioClass: 'iradio_minimal-blue'
    //     });

    // })
    
</script>