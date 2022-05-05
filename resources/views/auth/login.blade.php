@extends('layouts/index')
@section('title', 'Log in - GryOffline')

@section('content')
    <section>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-white register-background" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>

                                    <form class="mx-1 mx-md-4" method="POST" action="{{route('login')}}">
                                        @csrf

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="bi bi-envelope-fill fa-lg me-3 fa-fw register-ico"></i>
                                            <div class="form-outline flex-fill mb-0">

                                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email"  placeholder="Your e-mail" value="{{old('email')}}"/>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="bi-lock-fill fa-lg me-3 fa-fw register-ico"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password"/>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button class="button btn btn-secondary btn-lg">Sign in</button>
                                        </div>

                                    </form>

                                    <div class="rte mt text-center">
                                        <p style="margin-bottom: 0.5rem">
                                            Don't have an account? <a class="link-register" href="{{ route('register') }}"> Register now. </a>
                                        </p>
                                        <p>
                                            Forgot your password? <a class="link-register" href="#"> Reset it here. </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection