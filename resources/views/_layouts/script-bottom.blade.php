<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

<!-- modernizr js -->
<script type="text/javascript" src="{{asset('adminty/files/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="{{asset('adminty/files/bower_components/i18next/js/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>



<!-- range slider js -->
{{-- <script type="text/javascript" src="{{asset('adminty/files/bower_components/seiyria-bootstrap-slider/js/bootstrap-slider.js')}}"></script> --}}
<!-- Custom js -->
{{-- <script type="text/javascript" src="{{asset('adminty/files/assets/pages/range-slider.js')}}"></script> --}}

<!-- Custom js -->
<script type="text/javascript" src="{{asset('adminty/files/assets/js/pcoded.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/assets/js/vartical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript" src="{{asset('adminty/files/assets/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/terbilang.min.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>

{{-- <script src="{{asset('js/laravel-method.js')}}"> </script> --}}
<!-- /build-->
<!-- END adminty JS-->

<script>

function remove(id, action='delete', message='Anda yakin akan menghapus data ini?')
{
    bootbox.confirm({
        message: message,
        buttons: {
            confirm: {
                label: 'OK',
                className: 'btn-success ml-1'
            },
            cancel: {
                label: 'Cancel',
                className: 'btn-danger'
            }
        },
        callback: function(result){
            if(result){
                element = $('.btn-'+action+'-'+id);
                window.location.href = element.data('url');
            }
        }
    });
}
</script>