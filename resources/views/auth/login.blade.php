@extends('layouts/index')
@section('title', 'Login')

@section('content')
    <div class="row m-0 h-75 w-100 d-flex justify-content-center" >

        <div class="row text-center p-3 d-flex justify-content-center" >
            <h1>Login</h1>


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-fieldset">
                <input class="form-field{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Your e-mail" value="{{ old('email') }}">
            </div>
            <div class="form-fieldset">
                <input class="form-field{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
            </div>
            <button class="button">Submit</button>
        </form>

        <div class="rte mt">
            <p>Don't have an account? <a href="{{ route('register') }}">Register now.</a><br>Forgot
                your password? <a href="#">Reset it here.</a></p>
        </div></div>
    </div>
@endsection
