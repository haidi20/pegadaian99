<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="#">
  <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
  <meta name="author:haidi nurhadinata" content="#">
  <title>PEGADAIAN99</title>
  {{-- 
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('robust/app-assets/images/ico/apple-icon-60.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('robust/app-assets/images/ico/apple-icon-76.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('robust/app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('robust/app-assets/images/ico/apple-icon-152.png') }}"> 
  --}}
  {{-- 
  <link rel="apple-touch-icon" sizes="30x30" href="{{ asset('img/png/logo-icon-small.png') }}"> 
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/png/logo-icon-small.png') }}"> 
  --}}
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  @include('_layouts.script-top')
  @yield('script-top')
    
</head>
<body>
  
  @include('_layouts.loading')

  @yield('basic-content')

  @include('_layouts.script-bottom')
  <script>
    var laravel = {
      csrfToken: '{{ csrf_token() }}'
    }
  </script>
  @yield('script-bottom')

</body>
</html>
