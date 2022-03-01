<html>

    <!-- Font Awesome -->


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profiles| Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" >
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/bower_components/font-awesome/css/font-awesome.min.css') }}" href="">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/bower_components/Ionicons/css/ionicons.min.css') }}" href="">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/dist/css/AdminLTE.min.css') }}" href="">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/dist/css/skins/_all-skins.min.css') }}" href="">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/bower_components/morris.js/morris.css') }}" href="">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/bower_components/jvectormap/jquery-jvectormap.css') }}" href="">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" href="">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ URL::asset('public/admin2/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" href="">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" type="text/css" href="{{asset('public/vendor/css/jquery.ccpicker.css')}}">
    </head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>

<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ url('public/admin2/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
        <span class="hidden-xs">Alexander Pierce</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ url('public/admin2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

            <p>
                {{ Session::get('email') }}

            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">

            <div class="pull-right">
                <a href="{{ url('sign_out') }}" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
<!-- Control Sidebar Toggle Button -->
<li>
    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
</li>
</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('public/admin2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Session::get('email') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="{{ url('/add_user') }}">
                    <i class="fa fa-dashboard"></i> <span>Add User</span>

                </a>

            </li>

            <li class="treeview">
                <a href="{{ url('/all_users') }}">
                    <i class="fa fa-dashboard"></i> <span>Drivers List</span>

                </a>

            </li>



            <li class="treeview">
                <a href="{{ url('/all_pusers') }}">
                    <i class="fa fa-dashboard"></i> <span>Passengers List</span>

                </a>

            </li>
            
            
             <li class="treeview">
                <a href="{{ url('/shared_rides') }}">
                    <i class="fa fa-dashboard"></i> <span>All Shared Rides</span>

                </a>

            </li>
            
            
            
            <li class="treeview">
                <a href="{{ url('/unactive_drivers') }}">
                    <i class="fa fa-dashboard"></i> <span>New Driver Requests</span>

                </a>

            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 id="all_users"></h3>

                        <p>All Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3 id="active"></h3>

                        <p>Active</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3 id="unactive"></h3>

                        <p>Un Active</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->

            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
            @yield('middle')
        </div>
        <!-- /.row (main row) -->



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{  URL::asset('public/admin2/bower_components/jquery/dist/jquery.min.js')  }}" src=""></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{  URL::asset('public/admin2/bower_components/jquery-ui/jquery-ui.min.js')  }}" src=""></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{  URL::asset('public/admin2/bower_components/bootstrap/dist/js/bootstrap.min.js')  }}" src=""></script>
<!-- Morris.js charts -->
<script src="{{  URL::asset('public/admin2/bower_components/raphael/raphael.min.js')  }}" src=""></script>
<script src="{{  URL::asset('public/admin2/bower_components/morris.js/morris.min.js')  }}" src=""></script>
<!-- Sparkline -->
<script src="{{  URL::asset('public/admin2/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')  }}" src=""></script>
<!-- jvectormap -->
<script src="{{  URL::asset('public/admin2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')  }}" src=""></script>
<script src="{{  URL::asset('public/admin2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')  }}" src=""></script>
<!-- jQuery Knob Chart -->
<script src="{{  URL::asset('public/admin2/bower_components/jquery-knob/dist/jquery.knob.min.js')  }}" src=""></script>
<!-- daterangepicker -->
<script src="{{  URL::asset('public/admin2/bower_components/moment/min/moment.min.js')  }}" src=""></script>
<script src="{{  URL::asset('public/admin2/bower_components/bootstrap-daterangepicker/daterangepicker.js')  }}" src=""></script>
<!-- datepicker -->
<script src="{{  URL::asset('public/admin2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')  }}" src=""></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{  URL::asset('public/admin2/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')  }}" src=""></script>
<!-- Slimscroll -->
<script src="{{  URL::asset('public/admin2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')  }}" src=""></script>
<!-- FastClick -->
<script src="{{  URL::asset('public/admin2/bower_components/fastclick/lib/fastclick.js')  }}" src=""></script>
<!-- AdminLTE App -->
<script src="{{  URL::asset('public/admin2/dist/js/adminlte.min.js')  }}" src=""></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{  URL::asset('public/admin2/dist/js/pages/dashboard.js')  }}" src="s"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{  URL::asset('public/admin2/dist/js/demo.js')  }}" src=""></script>

<script type="text/javascript" src="{{asset('public/vendor/js/jquery.ccpicker.js')}}"></script>

<script>
    $(document).ready(function(){
        $.get('{{ url("count_all_users") }}',function(response){

            $('#all_users').append(response);
        });

        $.get('{{ url("count_active_users") }}',function(response){

            $('#active').append(response);
        });

        $.get('{{ url("count_unactive_users") }}',function(response){

            $('#unactive').append(response);
        });



        $("#phoneField1").CcPicker();
                $("#phoneField1").CcPicker("setCountryByCode","us");
                $("#phoneField1").CcPicker();
                $("#phoneField1").on("countrySelect", function(e, i){
                                                        
                                                    });

       
       
       
       

    });
</script>




</body>
</html>
