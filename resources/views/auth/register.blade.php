@extends('layouts/index')
@section('title', 'Register')

@section('content')
<div class="wrapper">
    <div class="rte">
        <h1>Register</h1>
    </div>

    <form method="POST" action="{{route('register')}}">
        @csrf
        <div class="form-fieldset">
            <input class="form-field {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Your e-mail" value="{{old('email')}}">
        </div>
        <div class="form-fieldset">
            <input class="form-field {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Your name" value="{{old('name')}}">
        </div>
        <div class="form-fieldset">
            <input class="form-field {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-fieldset">
            <input class="form-field" type="password" name="password_confirmation"
                   placeholder="Repeat password">
        </div>
        <button class="button">Submit</button>
    </form>
</div>
@endsection
