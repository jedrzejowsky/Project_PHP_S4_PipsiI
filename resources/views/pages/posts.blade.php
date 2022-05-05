@extends('layouts/index')

@section('title', 'GryOffline')

@section('content')
@if($posts->count() > 0)
@foreach($posts as $post)
<div class="row m-0 h-75 w-100 d-flex justify-content-center ">
    <div class="row text-center p-3 d-flex justify-content-center">
        <div class="col-md-6 mb-5">
            <div class="col-md-12">
                <a href=" {{route('posts/single', $post->slug) }}" class="link-title">
                    <h1>{{ $post->title }}</h1>
                </a>
            </div>
            <div class="col-md-12">
                <h4>
                    <span class="me-5">
                        <i class="bi bi-pencil"></i>
                        {{ $post->author }}
                    </span>
                    <span class="ms-auto">
                        {{ date('d.m.Y', strtotime($post->date)) }}
                    </span>
                </h4>
            </div>
            <div class="col-md-12 mb-4">
                <a href=" {{route('posts/single', $post->slug) }}">
                    <img src="{{ $post -> image }}" class="img-fluid" alt=""/>
                </a>
            </div>
            <div class="col-md-12 mb-4 text-start">
                <h3>
                    {!! $post->excerpt !!}
                </h3>
            </div>
            <div class="d-grid gap-2 col-md-12 mx-auto">
                <a href=" {{route('posts/single', $post->slug) }}" class="btn btn-secondary btn-lg btn-block" role="button">
                    Read more...
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

@include('partials/pagination', ['pagination' => $posts])

@else
    <div class="p-5 h-75 w-100 d-flex justify-content-center">
        <h1>
            No posts yet :(
        </h1>
    </div>
@endif
@endsection
