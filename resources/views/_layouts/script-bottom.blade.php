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
<script type="text/javascript" src="{{asset('js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootbox.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.cookie.min.js')}}"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script async src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script async src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> --}}
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
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

    function format_nominal(value)
    {
        // process format idr
        var locale = 'id';
        var options = {style: 'currency', currency: 'idr', minimumFractionDigits: 0, maximumFractionDigits: 0};
        var formatter = new Intl.NumberFormat(locale, options);

        return formatter.format(value)
    }
	
	function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}

</script>