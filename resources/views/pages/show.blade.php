@extends('layouts/index')

@section('content')

    <div class="row m-0 h-75 w-100 d-flex justify-content-center ">
        <div class="row text-center p-3 d-flex justify-content-center">
            <div class="col-md-6 mb-5">
                <div class="col-md-12">
                    <h1>{{ $post->title }}</h1>
                </div>
                <div class="col-md-12">
                    <h4>
                    <span class="me-5">
                        <i class="bi bi-pencil"></i>
                        {{ $post->author }}
                    </span>
                        <span class="ms-auto">
                        {{ $post->date }}
                    </span>
                    </h4>
                </div>
                <div class="col-md-12 mb-4">
                    <img src="{{ $post -> image }}" class="img-fluid" alt=""/>
                </div>
                <div class="col-md-12 mb-4 text-start">
                    <h3>
                        {!! $post->content !!}
                    </h3>
                </div>
            </div>
        </div>
    </div>

@endsection
