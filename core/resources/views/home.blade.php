<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Savjikitchen</title>

        <!-- Bootstrap -->
        <link href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        

        <!--fontawesome-->
        <link rel="stylesheet" href="{{URL::asset('bower_components/font-awesome/css/font-awesome.min.css')}}"/>

        <!--Custom Css-->
        <link rel="stylesheet" href="assets/css/styles.css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=246263435539826";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <div id="preloader">
            <div id="status"></div>
        </div>

        <!--Begin Header-->
        <header class="header">
            <div class="container">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="brand"><h2><a href="#homeSection">SavjiKitchen</a></h2></li>
                        <li class="active"><a href="#homeSection">Home</a></li>
                        <li><a href="#aboutSection">About</a></li>
                        <li><a href="#recipesSection">Recent Recipes</a></li>
                        <li><a href="#youtubeSection">Video Recipes</a></li>
                        <li><a href="#footer">Categories</a></li>
                        <li><a href="#footer">Contact</a></li>
                    </ul>
                </nav>     
            </div>
        </header>
        <!--End Header-->

        <main>

            <!--Begin Mini header-->
            <section class="panel-bg" id="homeSection">
                <figure class="parallex">
                    <img data-stellar-ratio="1.4" src="assets/img/chopped-onion.png" alt="chopped onion" />
                    <img data-stellar-ratio="1.3" src="assets/img/piece-onion.png" alt="piece onion" />
                    <img data-stellar-ratio="1.2" src="assets/img/ginger.png" alt="ginger" />
                    <img src="assets/img/right-topbanner.png" alt="tray" />
                </figure>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <figure>
                                <img class="haldi" src="assets/img/top-haldi.png" alt="Haldi">
                            </figure>
                        </div>
                        <div class="col-md-8 col-sm-8 slogan">
                            <p>We have more than 40,000 of cooking recipes</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 brand-logo text-center">
                            <div class="logo">
                                <figure>
                                    <img src="assets/img/logo.png" alt="Savjikitchen"/>
                                </figure> 
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <form class="form-inline search">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="keyword" placeholder="Find Recipe">
                                        </div>
                                        <button type="submit" class="btn btn-black">Search</button>
                                    </form>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <p class="quote"><b>W</b>e introduce new culture to visitors through cuisines of various countries offering a special dish for everyone regardless of their food preferences</p>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="mouse">
                                <div class="scroll"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Mini header-->


            <!--Start About-->
            <section class="about" id="aboutSection">
                <div class="container">
                    <header>
                        <h2 class="title"><span>About</span></h2>
                    </header>
                    <div class="row">
                        <div class="col-md-10 col-lg-offset-1">
                            <p class="about-desc">Savji community is known for its hot and spicy non-vegetarian delicacies and Savji masala in places where Savjis are concentrated in large numbers. Majority of the Savji people are non-vegetarian and hence preparation of variety of meat dishes is very common in the community. Goat meat, chicken and fish forms major component of Savji cuisine along with other vegetarian dishes. Alcohol consumption is not restricted in the community. Some of the common recipes include edmi (puris made of wheat flour, gram flour, chilies and other spices), khaimo or kheema (minced goat meat), shakanu chaknu (goat and chicken curry) prepared in special Savji spices.</p>

                            <div class="pull-right">
                                <button class="btn btn-black"><i class="fa fa-arrow-right"></i> More info</button>
                            </div>
                        </div>
                    </div>
                    <figure class="tomato">
                        <img data-stellar-ratio="1.2" data-stellar-delay="5" src="assets/img/tamotes.png" alt="tomato">
                    </figure>
                </div>
            </section>
            <!--End About-->

            <!--Start Our recipes-->
            <section class="our-recipes" id="recipesSection">
                <div class="container">
                    <header>
                        <h2 class="title"><span>Our Recipes</span></h2>
                    </header>
                    <div class="row">
                        @foreach($recipes as $recipe)
                        <div class="col-sm-6 col-md-4 recipe-item">
                            <div class="recipe-card">
                                <div class="overlay">
                                    <div class="overlay-bg">
                                        <a href="{{ url('/viewDetail/'.$recipe->id) }}"><span>View More</span></a>
                                    </div>                                    
                                </div>
                                <figure>
                                    <img src="{{ $recipe->recipeImage() }}" alt="{{ $recipe->name }}" />
                                    <figcaption>
                                        <h4>{{ str_limit($recipe->recipeName(), $limit = 30, $end = '...') }} <span class="like"><i class="fa fa-heart-o"></i> {{ count($recipe->like_count) }}</span></h4>
                                        <p>{{ $recipe->category->name }}</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <button class="btn btn-white more-btn">See More</button>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Our recipes-->


            <!--Start Video Channel-->
            <section class="yt-channel" id="youtubeSection">
                <div class="container">
                    <header>
                        <h2 class="title"><span>Video Recipes</span></h2>
                    </header>

                    <div class="row">
                        <div class="col-md-6 col-xs-12 main">
                            <iframe src="https://www.youtube.com/embed/MFm7D8U3pAc" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="row sub">
                                <div class="col-md-6 col-xs-6">
                                    <iframe src="https://www.youtube.com/embed/JUZYxhPeTfQ" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <iframe src="https://www.youtube.com/embed/AiEgCu7jh60" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <iframe src="https://www.youtube.com/embed/2nklnBTvZYo" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <iframe src="https://www.youtube.com/embed/pAkwPSj52Hs" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <button class="btn btn-black more-btn">See More</button>
                    </div>
                </div>
            </section>
            <!--End Video Channel-->

            <!--Start Newsletter-->
            <section class="newletter" id="newsletterSection">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <h2><i class="fa fa-envelope"></i> NEWSLETTER</h2><span>Get updates about new dishes and recent recipes</span>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6 newletter-form">
                            <form class="form-inline vmiddle">
                                <input type="text" class="form-control" id="emailSubscribe" name="emailSubscribe" placeholder="Email Address">
                                <button type="submit" class="btn btn-black">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Newsletter-->
        </main>
        <footer class="footer" id="footer">
            <div class="footer-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="fb-page" data-href="https://www.facebook.com/Savjikitchen/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Savjikitchen/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Savjikitchen/">Savjikitchen.com</a></blockquote></div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h2 class="title">Categories</h2>
                            <ul class="categories">
                                @foreach($categories as $catagory)
                                <li><a href="viewDetailRecipe?c={{ $catagory->name }}">{{ $catagory->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6 cheif">
                            <h2 class="title">Connect Us</h2>
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                            <h2 class="title">Contact Us</h2>
                            <ul class="contact">
                                <li><a href="#"><i class="fa fa-envelope"></i> info@savjikitchen.com</a></li>
                                <li><a href="#"><i class="fa fa-mobile-phone"></i> +91 9632463245</a></li>
                                <li><a href="#"><i class="fa fa-mobile-phone"></i> +91 9538650835</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
        <script src="{{URL::asset('bower_components/jquery.stellar/jquery.stellar.js')}}"></script>
        <script src="{{URL::asset('bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js')}}"></script>
        <script>
            $.stellar();
            $("html").niceScroll({
                scrollspeed: 100,
                bouncescroll: true
            });


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

$(document).on('click', 'nav li a', function(event){
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
});
        </script>
    </body>
</html>