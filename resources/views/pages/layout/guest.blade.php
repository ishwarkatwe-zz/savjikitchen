<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ env('PROJECT_NAME') }} -  @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}" />
        <!-- Theme style -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/dist/css/AdminLTE.min.css') }}" />

        <!-- Font Awesome -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/fontawesome/css/font-awesome.min.css') }}" />

        <!-- Ionicons -->
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('plugins/ionicons/css/ionicons.min.css') }}" />


        <link rel="stylesheet" href="{{url('bower_components/awesome-bootstrap-checkbox/build.css')}}"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{url('assets_landing/css/styles.css')}}"/>
        <link rel="stylesheet" href="{{url('bower_components/Waves/dist/waves.min.css')}}"/>
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600,700|Damion' rel='stylesheet' type='text/css' />
        <meta name="_token" content="{{ csrf_token() }}"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition register-page" style="background-image: url({{url('assets_landing/images/3.jpg')}})">
        <div class="row nav-bar text-center">
            <a href="{{ url('/') }}" class="btn"><i class="fa fa-home"></i> Home</a> | 
            <a href="#" class="btn"><i class="fa fa-info"></i> About</a> | 
            <a href="#" class="btn"><i class="fa fa-phone"></i> Contact</a>
        </div>
        <div class="black">
            <div class="row">
                <div class="col-md-7 text-center">
                    <h1 class="brand_name">SavjiKitchen</h1>		
					<br>
					<div class="faq">
						<p class="head">What is SavjiKitchen?</p>
						<ul>
							<li>Free Learning platform for food lovers.</li>
							<li>Savji food is a art of taste from most south Indian.</li>
							<li>A spot to highlight your cooking skills.</li>
							<li>We connect food lovers.</li>
						</ul>
					</div>
					<br>
					<ul class="line-box">
						<li>
							<i class="fa fa-star"> <h4>Learn Recipes</h4></i>
						</li>
						<li>
							<i class="fa fa-refresh"> <h4>Inspire Yourself</h4></i>
						</li>	
						<li>
							<i class="fa fa-share"> <h4>Share a Friend</h4></i>
						</li>
					</ul>
					
					
                </div>
                <div class="col-md-5">
                    <div class="register-box">

                        <div class="register-box-body">

                            @section('content')

                            @show
                            <div class="social-auth-links text-center">
                                <p>- OR -</p>
                                <a href="{{ url('/auth/login') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
                                <a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
                            </div>


                        </div><!-- /.form-box -->
                    </div><!-- /.register-box -->
                </div>
            </div>
<br>
<br>
        </div>

        <footer class="container-fluid home_footer"  style="color:#FFFFFF">
			<div class="container-fluid" style="padding: 20px;">
				<div class="col-md-4">
					<h4>Interested?</h4>
					<h6>Tell us a little more and we'll get in touch.</h6>
					<h3><i class="fa fa-envelope"></i> info@savjikitchen.com</h3>
				</div>
				<div class="col-md-4">
					<h4>about us</h4>
					<div>SavjiKitchen is a cooking website</div>
				</div>
				<div class="col-md-4">
					<h4>site map</h4>
					<ul style="padding-left:0px;list-style:none">
						<li><a href="#" style="color:#FFF">Home</a></li>
						<li><a href="#" style="color:#FFF">About</a></li>
						<li><a href="#" style="color:#FFF">Policy & Privacy</a></li>
						<li><a href="#" style="color:#FFF">Terms & Condition</a></li>
					</ul>
					
					<ul class="hidden-xs btn-float">
						<li class="facebook">
							<a href="https://www.facebook.com/Savjikitchen/"><i class="fa fa-facebook"></i></a>
						</li>
						<li class="google">
							<a href="#"><i class="fa fa-google"></i></a>
						</li>
						<li class="twitter">
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li class="youtube">
							<a href="#"><i class="fa fa-youtube"></i></a>
						</li>
					</ul>
				</div>
				
			</div>
			<div class="row text-center footer-bar">
					&copy; 2016, Dynasofts Corporation
			</div>
		</footer>

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

        <script src="{{url('bower_components/Waves/dist/waves.min.js')}}"></script>

        <script>

Waves.attach('.btn');
Waves.attach('.recipe_image');
Waves.init();
        </script>
    </body>
</html>
