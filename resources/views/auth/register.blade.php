@extends('layouts.auth')

@section('content')
<div class="login-form">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>User Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
            <label>Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
        <div class="social-login-content">
            <div class="social-button">
                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
            </div>
        </div>
        <div class="register-link m-t-15 text-center">
            <p>Already have account ? <a href="{{ route('login') }}"> Sign in</a></p>
        </div>
    </form>
</div>
@endsection
