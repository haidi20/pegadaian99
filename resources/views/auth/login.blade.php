@extends('_layouts.basic')

@section('script-top')
    <style>
        .login-block{
            background: url({{url('images/login-bg.jpg')}})
        }
        .zmdi-lg{
            font-size:40px;
            cursor: pointer;
        }
    </style>
@endsection

@section('script-bottom')
    <script>
        $(function(){
            $('#username').val($.cookie('username'));
            $('#password').val($.cookie('password'));
            $('#remember').attr('checked', true);
        });

        function remind()
        {
            var username      = $('#username').val();
            var password      = $('#password').val();
            var attr_remember = $('#remember')
            // set cookies to expire in 14 days
            $.cookie('username', username, { expires: 14 });
            $.cookie('password', password, { expires: 14 });
            $.cookie('remember', true, { expires: 14 });

            console.log($('#remember').attr('checked'));
        }

        function refresh()
        {
            $.ajax({
                type: 'GET',
                url: '{{url('/refresh-captcha')}}',
                success: function(data){
                    $('.captcha span').html(data);
                }
            });
        }
    </script>
@endsection

@section('basic-content')
<section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material" action="{{route('login')}}" method="post">
                            {{csrf_field()}}
                            <div class="text-center">
                                {{-- <img src="../files/assets/images/logo.png" alt="logo.png"> --}}
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    @if (count($errors) > 0)
                                    
                                        <div class="alert alert-warning background-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            <strong>Warning!</strong>
                                            <ul>
                                            @foreach ($errors->all() as $error)
                                               
                                                   <li> {{ $error }}</li>
                                               
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Form Login</h3>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="form-group form-primary">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Your Username">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group form-primary" align="center">
                                        <div class="captcha">
                                            <span align="center">{!! captcha_img() !!}</span>
                                        </div>
                                        <br>
                                        <i class="zmdi zmdi-refresh-alt zmdi-lg" onClick="refresh()"></i>
                                        <br>
                                        <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Captcha" >
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="" id="remember" name="remember" onClick="remind()">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                           {{--  <div class="forgot-phone text-right f-right">
                                                <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot Password?</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    {{-- <hr/> --}}
                                    <div class="row">
                                        <div class="col-md-2">
                                            {{-- <img src="../files/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
@endsection
