<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenger.kaijuthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Oct 2015 14:51:41 GMT -->
<head>
<meta charset="utf-8">
{{-- <link rel="icon" type="image/png" href="{{ asset('template/images/logo_bontang.png') }}"> --}}
<title>Sitemanager</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="description" content="Point Of Sale">
<meta name="author" content="KaijuThemes">
<meta id="token" name="csrf-token" content="{{ csrf_token() }}">

@include('_layouts.script-top')
@yield('script-top')

</head>
<body class="infobar-offcanvas">
    <div id="app"></div>

    @include('_layouts.script-bottom')
</body>

{{-- <body class="infobar-offcanvas">
    
@include('_layouts.header')

<div id="wrapper">
    <div id="layout-static">
    
        @include('_layouts.sidebar')

        <div class="static-content-wrapper">
        	@yield('content')

			@include('_layouts.footer')
        </div>
    </div>
</div>

<script>
    var baseUrl = '{{ url('/') }}';
</script>
@include('_layouts.script-bottom')
@yield('script-bottom')
</body> --}}

<!-- Mirrored from avenger.kaijuthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Oct 2015 15:00:24 GMT -->
</html>