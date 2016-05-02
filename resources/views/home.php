<!DOCTYPE html>
<html lang="en" ng-app="SavjiKitchen">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>SavjiKitchen</title>
        <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>

        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600,700|Damion' rel='stylesheet' type='text/css' />
        <!-- Bootstrap -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.css"/>
        <link rel="stylesheet" href="assets_landing/css/styles.css"/>
        <link rel="stylesheet" href="bower_components/Waves/dist/waves.min.css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            /* fluid 5 columns */
            .grid-sizer,
            .grid-item { width: 20%; }
            /* 2 columns */
            .grid-item--width2 { width: 40%; }
        </style>
    </head>
    <body>
        <section class="section home" id="section1">
            <div class="content">
                <div class="header">
                    <div class="black text-center">
                        <a class="btn btn-login" href="<?php echo url('auth/register') ?>"><i class="ion-person-add"></i> Register</a>
                        <a class="btn btn-login" href="<?php echo url('auth/login') ?>"><i class="ion-key"></i> Login</a>
                        <div class="clearfix"></div>
                        <h1 class="white-header">SavjiKitchen</h1>

                        <div class="form-group search" ng-controller="searchController">
                            <input type="text" class="form-control" placeholder="What you want to cook?" ng-model="filter_data" ng-change="filter()" ng-focus="showFilter()" ng-blur="hideFilter()"/>
                            <button class="btn btn-primary"><i class="ion-ios-search"></i> Search</button>

                            <div class="filter" ng-show="search_recipes.length && listStatus">
                                <ul>
                                    <li ng-repeat="recipe in search_recipes">
                                        <a href="#" >
                                            <img src="img/{{recipe.image}}" alt="...">

                                            <div>
                                                <h4>{{recipe.name}}</h4>
                                                <p>in <span>{{recipe.category.name}}</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--785475-->
                <div class="container-fluid recipes" ng-controller="recipeController">
                    <div class="text-right">

                        <div class="btn-group" role="group" aria-label="...">

                            <button class="btn " ng-class="(sort == 'popular') ? 'btn-primary' : 'btn-default'" ng-click="changeSortOrder('popular')">Popular</button>
                            <button class="btn " ng-class="(sort == 'recent') ? 'btn-primary' : 'btn-default'" ng-click="changeSortOrder('recent')">Recent</button>
                        </div>
                    </div>


                    <div masonry class="row">
                        <div class="masonry-brick col-md-3 col-sm-6 col-xs-12" ng-repeat="recipe in recipes">
                            <div class="thumbnail recipe_box">
                                <div class="image">
                                    <a href="#" ng-click="openModal(recipe)">
                                        <img class="recipe_image" ng-src="<?php echo url('img/{{recipe.image}}') ?>" alt="...">
                                    </a>
                                    <div class="cat">{{recipe.category.name}}</div>
                                </div>
                                <div class="caption">
                                    <p class="title">{{recipe.name}}</p>
                                </div>
                                <div class="footer">
                                    <div class="likes">
                                        <p><i class="fa fa-thumbs-up"></i> {{recipe.like_count.length}}</p>
                                    </div>
                                    <img class="awatar" ng-src="<?php echo url('profiles/{{recipe.user.image}}'); ?>"/>
                                    <div class="name">
                                        <p>{{recipe.user.name}}</p>
                                        <span ng-bind="convertToDate(recipe.created_at) | date:'medium'">{{recipe.created_at}}</span>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="hide">
            <div class="content">
                <h2 class="light-header">About</h2>
                <p>Savji community is known for its hot and spicy non-vegetarian delicacies and Savji masala in places where Savjis are concentrated in large numbers. Majority of the Savji people are non-vegetarian and hence preparation of variety of meat dishes is very common in the community. Goat meat, chicken and fish forms major component of Savji cuisine along with other vegetarian dishes. Alcohol consumption is not restricted in the community.[citation needed] Some of the common recipes include edmi (puris made of wheat flour, gram flour, chilies and other spices), khaimo or kheema (minced goat meat), shakanu chaknu (goat and chicken curry) prepared in special Savji spices.[7] 

                    <br/><br/>Savji food is famous for its very hot and spicy flavor in many cities (where they are in large number) served in small family style restaurants called Savji khanavali[8] or "Savji hotel" or bhojanalaya,[1] found in large numbers in places like Hubli, Bangalore, Belgaum in Karnataka, Nagpur and Solapur in Maharashtra. There are a line of Savji bhojanalays[9][10] in Nagpur that are very popular in Maharashtra. So much so that, the Indian chef Sanjeev Kapoor once featured Savji mutton on one of his shows and its recipe is also listed on his website.[11]</p>
            </div>
        </section>

        <section class="section about hide" id="section1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <img class="daniya" src="assets_landing/images/food_01.png"/>
                    </div>
                    <div class="col-md-6 text-center">
                        <h2 class="light-header">About</h2>
                        <p class="desp">Savji community is known for its hot and spicy non-vegetarian delicacies and Savji masala in places where Savjis are concentrated in large numbers. Majority of the Savji people are non-vegetarian and hence preparation of variety of meat dishes is very common in the community. Goat meat, chicken and fish forms major component of Savji cuisine along with other vegetarian dishes. Alcohol consumption is not restricted in the community.[citation needed] Some of the common recipes include edmi (puris made of wheat flour, gram flour, chilies and other spices), khaimo or kheema (minced goat meat), shakanu chaknu (goat and chicken curry) prepared in special Savji spices.[7] 

                            <br/><br/>Savji food is famous for its very hot and spicy flavor in many cities (where they are in large number) served in small family style restaurants called Savji khanavali[8] or "Savji hotel" or bhojanalaya,[1] found in large numbers in places like Hubli, Bangalore, Belgaum in Karnataka, Nagpur and Solapur in Maharashtra. There are a line of Savji bhojanalays[9][10] in Nagpur that are very popular in Maharashtra. So much so that, the Indian chef Sanjeev Kapoor once featured Savji mutton on one of his shows and its recipe is also listed on his website.[11]</p>

                    </div>
                </div>
            </div>


        </section>


        <!--
<footer class="container-fluid home_footer">
    <div class="row">
        <div class="col-md-6">
            <ul class="menu">
                <li><a>Home</a></li>
                <li><a>Recipes</a></li>
                <li><a>Privacy policy</a></li>
                <li><a>Terms and condition</a></li>

            </ul>
            <div class="clearfix"></div>
            <p>
                Copyright © 2016 <strong>SavjiKitchen</strong>. All rights reserved.
            </p>
        </div>
        <div class="col-md-6">
            <ul class="social">
                <li><a><i class="fa fa-facebook"></i></a></li> 
                <li><a><i class="fa fa-twitter"></i></a></li> 
                <li><a><i class="fa fa-youtube"></i></a></li> 
            </ul>
        </div>
    </div>
</footer>-->

      
		<footer class="container-fluid home_footer"  style="color:#FFFFFF">
			<div class="container-fluid" style="padding: 20px;">
				<div class="col-md-4">
					<h4>Interested?</h4>
					<h6>Tell us a little more and we'll get in touch.</h6>
					<h3><i class="fa fa-envelope"></i> info@savjikitchen.com</h3>
				</div>
				<div class="col-md-4">
					<h4>about us</h4>
					<div>Savji community is known for its hot and spicy non-vegetarian delicacies and Savji masala in places where Savjis are concentrated in large numbers. Majority of the Savji people are non-vegetarian and hence preparation of variety of meat dishes is very common in the community.  <a href="/about" class="text-white"> Read more</a></div>
				</div>
				<div class="col-md-4">
					<h4>site map</h4>
					<ul style="padding-left:0px;list-style:none">
						<li><a href="/index.php" style="color:#FFF">Home</a></li>
						<li><a href="/about" style="color:#FFF">About</a></li>
						<li><a href="/auth/login" style="color:#FFF">Login</a></li>
						<li><a href="/auth/register" style="color:#FFF">Register</a></li>
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
					SavjiKitchen &copy; <?php echo date('Y'); ?>, Powered by Dynasofts
			</div>
		</footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <script src="bower_components/Waves/dist/waves.min.js"></script>
        <script src="bower_components/parallax.js/parallax.min.js"></script>
        <script src="bower_components/angular/angular.min.js"></script>
        <script src="bower_components/masonry/dist/masonry.pkgd.min.js"></script>



        <script src="bower_components/jquery-bridget/jquery-bridget.js"></script>
        <script src="bower_components/ev-emitter/ev-emitter.js"></script>
        <script src="bower_components/desandro-matches-selector/matches-selector.js"></script>
        <script src="bower_components/fizzy-ui-utils/utils.js"></script>
        <script src="bower_components/outlayer/item.js"></script>
        <script src="bower_components/outlayer/outlayer.js"></script>
        <script src="bower_components/imagesloaded/imagesloaded.js"></script>
        <script src="bower_components/angular-masonry/angular-masonry.js"></script>
        <script src="bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
        <script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>


        <script src="scripts/services/recipeServices.js"></script>
        <script src="scripts/controllers/recipesController.js"></script>
        <script src="scripts/controllers/searchesController.js"></script>
        <script src="scripts/app.js"></script>
        <script src="plugins/adaptive-bg/jquery.adaptive-backgrounds.js"></script>

        <script>
        </script>
        <script>
            $(document).ready(function () {
//                $('#fullpage').fullpage({
                //                    anchors: ['home', 'about', 'special'],
                //                });
            });

            Waves.attach('.btn');
            Waves.attach('.recipe_image');
            Waves.init();

            $('.grid').masonry({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.grid-item',
                percentPosition: true
            })

            $(document).ready(function () {
                $.adaptiveBackground.run()
            });
        </script>
    </body>
</html>