@extends('layouts/index')

@section('title', 'Verify your email')

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Verify your email</p>

                            <div class="rte mt text-center">
                                <p style="margin-bottom: 0.5rem">
                                    Still not verified? <a class="link-register" href="{{ route('verification.resend') }}"> Click here to get verified. </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
