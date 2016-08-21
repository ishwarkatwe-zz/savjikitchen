@extends('pages.layout.guest')
@section('title', 'Register')
@section('title-info', 'Please fill in information for your account.')
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
				<form method="POST" action="<?php echo url('auth/register') ?>">
					{!! csrf_field() !!}

					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name" value="{{ old('name') }}" required="required" placeholder="User name">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="{{ old('email') }}"  required="required" placeholder="Email address">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password"  required="required" placeholder="Password">
					</div>

					<div  class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control" name="password_confirmation"  required="required" placeholder="Confirm Password">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary"><i class="ion-person-add"></i> Register</button>
						<a href="{{ url('/auth/login') }}" class="text-center link pull-right">I already have a membership</a>
					</div>
					
				</form>
				<div class="social-auth-links text-center">
						<p>- OR -</p>
						<a href="{{ url('/auth/login') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
						<a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
					</div>
			</div><!-- /.form-box -->
		</div><!-- /.register-box -->
	</div>
</div>
@stop
