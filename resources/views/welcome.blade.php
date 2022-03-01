<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/homer_admin-v1.9.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 06:36:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- Page title -->
    <title>Profiles Login</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('public/vendor/fontawesome/css/font-awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('public/vendor/metisMenu/dist/metisMenu.css')}}" />
    <link rel="stylesheet" href="{{asset('public/vendor/animate.css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/vendor/bootstrap/dist/css/bootstrap.css')}}" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('public/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('public/fonts/pe-icon-7-stroke/css/helper.css')}}" />
    <link rel="stylesheet" href="{{asset('public/styles/style.css')}}">

    <link rel="shortcut icon" href="{{ URL::asset('public/img/1-01.png') }}">

</head>
<body class="blank">

<!-- Simple splash screen-->


<div class="color-line"></div>



<div class="login-container">
    <div class="row">
        <div class="col-md-12">


            <div class="hpanel dropdown-toggle">

                <div class="panel-body hdropdown notification animated flipInX" style="border-radius: 6px">
                    <div style="margin-left: 80px; margin-top: -20px;">


                        <img alt="{{Session::get('LOGO_LARGE')}}" style="width: 200px; height: 85px" src="{{ URL::asset('public/img/1-01.png') }}">

                    </div>
                    @if(Session::has('msg'))
                    <p class="alert alert-danger hidealert"><span style="margin-left: 70px">{{Session::get('msg')}}</span></p>
                    <br>
                    @endif
                    <form style="margin-top: 20px" method="post" action="{{ url('admin_login') }}" id="loginForm">

                        <div class="form-group">
                            <!--   @if ($errors->any())
                               <hr/>
                               <ul class="alert alert-danger">
                                   @foreach($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                   @endforeach
                               </ul>-->
                            <!--    @endif-->
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control" id="code" name="email" type="email" placeholder="Enter Compnay Email" title="Please Enter Company Email">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="username">Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Enter Company Password" title="Please enter your Password">
                        </div>

                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                       
                    </form>

                    <div class="col-md-12 text-center" style="margin-top: 30px">
                        <strong>2016 Copyright By</strong><span class="pull-right"> <img style="width: 40px; height: 35px" src="{{ URL::asset('public/img/1-01.png') }}"></span>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('public/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('public/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/vendor/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('public/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/vendor/metisMenu/dist/metisMenu.min.js')}}"></script>
<script src="{{asset('public/vendor/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('public/vendor/sparkline/index.js')}}"></script>
<script src="{{asset('public/scripts/homer.js')}}"></script>


<script>
    $(document).ready(function(){
        $("#code").on('keypress',function(){
            $('.hidealert').hide();
        });
    });

</script>
</body>

<!-- Mirrored from webapplayers.com/homer_admin-v1.9.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2017 06:36:01 GMT -->
</html>