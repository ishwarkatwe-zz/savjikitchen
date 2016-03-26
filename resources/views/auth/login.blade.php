@extends('pages.layout.guest')
@section('title', 'Login')
@section('title-info', 'Fill in the login information')
@section('content')
@parent
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

    <div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ url('auth/register') }}" class="btn btn-default">Register</a>
    </div>
</form>
@stop

