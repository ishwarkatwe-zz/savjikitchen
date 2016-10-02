<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}"/>
        <title>Savjikitchen</title>
        @yield('meta')
        <!-- Bootstrap -->
        <link href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

        <style>
            label.error{
                color: red;
                position: absolute;
                font-size: 12px;
            }

            .desp{
                font-size: 16px;
                line-height: 25px;
            }
            
            main{
                min-height: 70vh;
            }
        </style>

        <!--fontawesome-->
        <link rel="stylesheet" href="{{URL::asset('bower_components/font-awesome/css/font-awesome.min.css')}}"/>

        <!--Custom Css-->
        <link rel="stylesheet" href="{{URL::asset('assets/css/styles.css')}}"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

    </head>
    <body>
        <div id="preloader">
            <div id="status"></div>
        </div>

        <!--Begin Header-->
        <header class="header">
            <div class="container">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="brand"><h2><a href="{{ url('/')}}">SavjiKitchen</a></h2></li>
                        <li class="active"><a href="{{ url('/')}}">Home</a></li>
                        <li><a href="{{ url('/about')}}">About</a></li>             
                        <li><a href="{{ url('/contact')}}">Contact</a></li>             
                        <li><a href="#" onclick="window.location ='{{ url('/profile')}}'"><i class="fa fa-user"></i> Welcome : 
                                @if(!Auth::check()) 
                                Guest  
                                @else  
                                {{ Auth::user()->userName() }}
                                @endif
                            </a></li>
                        @if(!Auth::check())
                        <li><a href="#" onclick="window.location ='{{ url('/auth/login')}}'"><i class="fa fa-key"></i> Sign-In</a></li>     
                        @else
                        <li><a href="#" onclick="window.location ='{{ url('/auth/logout')}}'"><i class="fa fa-sign-out"></i> Log Out</a></li>   
                        @endif          
                    </ul>
                </nav>     
            </div>
        </header>
        <!--End Header-->

        <section class="panel-bg" style="height:150px">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <figure>
                            <img class="haldi" src="{{URL::asset('assets/img/top-haldi.png')}}" alt="Haldi">
                        </figure>
                    </div>
                    <div class="col-md-8 col-sm-8 slogan">
                        <p>We have more than 4,000+ followers in social media</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="container view-recipe">

            <main>


                @section('content')

                @show

            </main>
        </div>

        <footer class="footer">
            <section class="copywrite">
                <div class="container vmiddle">
                    <Strong>SavjiKitchen</Strong> &copy; 2016
                    <a class="to-top" id="target"><i class="fa fa-arrow-up"></i></a>
                </div>
            </section>
        </footer>


        <!-- Theme JS Scripts -->
        <script src="{{URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/jquery.validate/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('plugins/jquery.validate/additional-methods.js') }}"></script>

        <script type="text/javascript">
                            $.ajaxSetup({
                            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
                            });
                            var base_url = "{{ url() }}";
        </script>
        <script>
            jQuery(window).load(function () {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(1000).fadeOut("slow");
            });
            $("#target").click(function () {
            $('html, body').animate({scrollTop: '0px'}, 300);
            });
            $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 50) {
            $('.header').addClass('fixed');
            } else {
            $('.header').removeClass('fixed');
            }
            });
            $(document).ready(function () {
            $('#frmReview').validate({
            rules: {
            name: "required",
                    email: {
                    email: true
                    },
                    rating: "required",
                    feedback: "required",
                    contact: {
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
                            contact: {
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
        @yield('include_js');
    </body>
</html>