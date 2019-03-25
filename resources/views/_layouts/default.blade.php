@extends('_layouts.basic')

@section('basic-content')
	<div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
          @include('_layouts.header')
          
          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  
                  <div class="pcoded-content">
                      <div class="pcoded-inner-content">
                          <div class="main-body">
                              <div class="page-wrapper">

                                  @yield('content')

                              </div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
@endsection
