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
            <a href="{{ url('/about') }}" class="btn"><i class="fa fa-info"></i> About</a> | 
            <a href="{{ url('/contact') }}" class="btn"><i class="fa fa-phone"></i> Contact</a>
        </div>
        <div class="black">
            

                            @section('content')

                            @show
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
						<li><a href="{{ url('/') }}" style="color:#FFF">Home</a></li>
						<li><a href="{{ url('/about') }}" style="color:#FFF">About</a></li>
						<li><a href="{{ url('/auth/login') }}" style="color:#FFF">Login</a></li>
						<li><a href="{{ url('/auth/register') }}" style="color:#FFF">Register</a></li>
					</ul>
					
					<ul class="hidden-xs btn-float">
						<li class="facebook">
							<a href="https://www.facebook.com/Savjikitchen/" target="_black"><i class="fa fa-facebook"></i></a>
						</li>
						<li class="google">
							<a href="https://plus.google.com/103682649455187926306" target="_blank"><i class="fa fa-google"></i></a>
						</li>
						<li class="twitter">
							<a href="https://twitter.com/savjikitchen" target="_blank"><i class="fa fa-twitter"></i></a>
						</li>
						<li class="youtube">
							<a href="https://www.youtube.com/channel/UCw0CIGjw96q1yKnHysKZ1NA" target="_blank"><i class="fa fa-youtube"></i></a>
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
		
		 <script type="text/javascript" src="{{ URL::asset('plugins/jquery.validate/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/jquery.validate/additional-methods.js') }}"></script>

        <script src="{{url('bower_components/Waves/dist/waves.min.js')}}"></script>

        <script>

Waves.attach('.btn');
Waves.attach('.recipe_image');
Waves.init();


		$(document).ready(function () {
			$('#frmReview').validate({
				rules: {
					name: "required",
					email: {
						email: true
					},
					rating: "required",
					feedback: "required",
					contact:  {
						required: true,
						number: true
					}
				},
				messages: {
					name: "Please enter user name",
					email: {
						email: "Please provide valid email"
					},
					rating: "Please choose rating",
					feedback: "Please provide your feedback",
					contact:  {
						required: "Please enter contact number",
						number: "Please enter valid contact number"
					}
				},
				submitHandler: function (form) {
					form.submit();
					return false;
				}
			});
		});
        </script>
    </body>
</html>
