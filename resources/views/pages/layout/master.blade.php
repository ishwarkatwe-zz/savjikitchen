<!DOCTYPE html>
<html>
    <head>
        <title>{{ env('PROJECT_NAME') }} -  @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}" />
        <!-- Theme style -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/dist/css/AdminLTE.min.css') }}" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/dist/css/skins/_all-skins.min.css') }}" />
        <!-- Font Awesome -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/fontawesome/css/font-awesome.min.css') }}" />
        <!-- Ionicons -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/ionicons/css/ionicons.min.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/tagsinput/bootstrap-tagsinput.css') }}" />

        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/jcrop/css/jquery.Jcrop.css') }}"/>

        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/custom/style.css') }}"/>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/toastr/toastr.min.css') }}"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <meta name="_token" content="{{ csrf_token() }}"/>
        <style>
            label.error{
                position: absolute;
                color:#f00;
                font-weight: 400;
            }

            .form-group {
                margin-bottom: 25px;
            }
        </style>
    </head>
    <body class="hold-transition skin-red sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="{{ url() }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>S</b>K</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Savji</b>Kitchen</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-thumbs-up text-aqua"></i> <small>Ishwar katwe Likes <b>Chicken Peper masala</b></small>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-plus text-primary"></i> <small>Ishwar katwe added <b>Chicken Peper masala</b></small>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-comments  text-primary"></i> <small>Ishwar katwe commeted on <b>Chicken Peper masala</b></small>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ Auth::User()->userImage() }}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Welcome : {{ Auth::user()->userName() }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{ Auth::User()->userImage() }}" class="img-circle" alt="User Image">
                                        <p>
                                            {{ Auth::user()->userName() }}
                                            <small>Member since {{ Auth::user()->getSinceDate() }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ url('edit') }}" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ url('auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
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

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ Auth::User()->userImage() }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>{{ Auth::User()->userName() }}</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->  
                    <form action="{{ url('manage_recipe')}}" method="get" class="sidebar-form">
                        <div class="input-group" style="position:inherit">
                            {!! Form::text('keyword',Input::old('keyword',(!empty($_GET['keyword'])?$_GET['keyword']:'')), array("id"=>"keyword","class"=>"form-control", "placeholder"=>"What would you like to cook today?")) !!}
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li><a href="{{ url("profile") }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
                        <li><a href="{{ url("followers") }}"><i class="fa fa-hand-o-up"></i> <span>Followers / Following</span></a></li>
                        <li><a href="{{ url("add_recipe") }}"><i class="fa fa-plus"></i> <span>Add Recipes</span></a></li>
                        <li><a href="{{ url("my_recipe?userId=".Auth::user()->id) }}"><i class="fa fa-list-ul"></i> <span>My Recipes</span></a></li>
                        <li><a href="{{ url("manage_recipe") }}"><i class="fa fa-list-alt"></i> <span>Search Recipe</span></a></li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>Layout Options</span>
                                <span class="label label-primary pull-right">4</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                                <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                                <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                                <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="header">Find your taste now?</li>
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Recent</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Popular</span></a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Favorite</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        @yield('title')
                        <small>@yield('title-info')</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">@yield('title')</li>
                    </ol>
                </section>
                <!-- Content Header (Page header) -->
                <section class="content">
                    @section('content')

                    @show
                </section>
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; {{ date('Y') }} <a href="#">SavjiKitchen</a>.</strong> All rights reserved.
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
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
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
                                <a href="javascript::;">
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
                                <a href="javascript::;">
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
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                    </div><!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
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
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Other sets of options are available
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div><!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.tab-pane -->
                </div>
            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->


        <!-- Modal -->
        <div class="modal fade" id="commentsBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"  >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal_title">Modal title</h4>
                    </div>
                    <div class="modal-body" id="modal_body">
                        ...
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="commonBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="commonTitle">Modal title</h4>
                    </div>
                    <div class="modal-body" id="commonBody">
                        ...
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="largeTitle">Modal title</h4>
                    </div>
                    <div class="modal-body" id="largeBody">
                        ...
                    </div>
                </div>
            </div>
        </div>


        <!-- jQuery 2.1.4 -->
        <script type="text/javascript" src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script type="text/javascript" src="{{ URL::asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script type="text/javascript" src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script type="text/javascript" src="{{ URL::asset('plugins/fastclick/fastclick.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script type="text/javascript" src="{{ URL::asset('plugins/dist/js/app.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script type="text/javascript" src="{{ URL::asset('plugins/dist/js/demo.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/jquery.validate/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/jquery.validate/additional-methods.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/tagsinput/bootstrap-tagsinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/tagsinput/typeahead.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/jcrop/js/jquery.Jcrop.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/toastr/toastr.min.js') }}"></script>
        <script type="text/javascript">
$.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});
var base_url = "{{ url() }}";
        </script>

        <script type="text/javascript" src="{{ URL::asset('plugins/typeahead/bootstrap3-typeahead.min.js') }}" ></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/custom/allInOne.js') }}"></script>

        @yield('include_js');

        <?php
        $success = Session::get('show_success');
        $warning = Session::get('show_warning');
        $error = Session::get('show_error');
        $info = Session::get('show_info');
        ?>
        <input type="hidden" id="show_success_hidden" value="<?php echo (isset($success)) ? $success : ""; ?>" />
        <input type="hidden" id="show_error_hidden" value="<?php echo (isset($error)) ? $error : ""; ?>"  />
        <input type="hidden" id="show_warning_hidden" value="<?php echo (isset($warning)) ? $warning : ""; ?>"  />
        <input type="hidden" id="show_info_hidden" value="<?php echo (isset($info)) ? $info : ""; ?>"  />
    </body>
</html>