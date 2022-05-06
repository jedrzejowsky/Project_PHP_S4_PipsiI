@extends('layouts/index')

@section('title', 'Reset Password - GryOffline')

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Reset password</p>

                            <form class="mx-1 mx-md-4" method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <i class="bi bi-envelope-fill fa-lg me-3 fa-fw register-ico"></i>
                                    <div class="form-outline flex-fill mb-0">

                                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email"  placeholder="Your e-mail" value="{{old('email')}}"/>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button class="button btn btn-secondary btn-lg">Reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
