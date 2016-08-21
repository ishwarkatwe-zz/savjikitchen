@extends('pages.layout.guest')
@section('title', 'Login')
@section('title-info', 'Fill in the login information')
@section('content')
@parent
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
						
								<form method="POST" action="{{ url('/auth/login') }}">
									{!! csrf_field() !!}

									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required="required">
									</div>

									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
									</div>

									<div class="checkbox checkbox-primary">
										<input type="checkbox" id="checkbox1" checked>
										<label for="checkbox1">
											Remember me
										</label>
									</div>

									<div class="text-center">
										<button type="submit" class="btn btn-primary"><i class="ion-key"></i> Login</button>
										<a href="{{ url('auth/register') }}" class="btn btn-default"><i class="ion-person-add"></i> Register</a>
									</div>
								</form>
								<div class="social-auth-links text-center">
									<p>- OR -</p>
									<a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
									<a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
								</div>
                        </div><!-- /.form-box -->
                    </div><!-- /.register-box -->
                </div>
             </div>
@stop

