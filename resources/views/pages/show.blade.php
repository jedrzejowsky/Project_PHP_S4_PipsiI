@extends('layouts/index')

@section('title', "$post->title - GryOffline")

@section('content')

    <div class="row m-0 h-75 w-100 d-flex justify-content-center ">
        <div class="row text-center p-3 d-flex justify-content-center">
            <div class="col-xs-12 col-sm-9 col-lg-6 mb-5">
                <div class="col-md-12">
                    <h1>{{ $post->title }}</h1>
                </div>
                <div class="col-md-12">
                    <h4>
                        <span class="me-5">
                            <i class="bi bi-pencil"></i>
                            {{ $post->author->name }}
                        </span>
                        <span class="ms-auto">
                        {{  date('d.m.Y', strtotime($post->date))  }}
                        </span>
                    </h4>
                </div>
                <div class="col-md-12 mb-4">
                    <img src="{{ $post -> photo }}" class="img-fluid img-show" alt="Post image"/>
                </div>
                <div class="col-md-12 mb-4 text-start">
                    <h3>
                        {!! $post->content !!}
                    </h3>
                </div>

                {{--tworzenie komentarzy--}}
                <section class="text-start mt-5">
                    @if(Auth::check() != null)
                        @can('can-comment')
                    <form method="POST" action="/post/{{ $post->slug }}/comments">
                        @csrf

                        <div class="comment p-2">
                            <p class="mb-3">
                                <img class="img-avatar me-2" src="https://robohash.org/{{ Auth::user()->id }}.png?set=set3"/>
                                Want to participate?
                            </p>

                            <div class="d-flex flex-row mb-3">
                                <div class="form-outline flex-fill mb-0">
                                    <textarea class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" rows="3" placeholder="Add your comment" name="content">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <button class="button btn btn-success btn-md">
                                <i class="bi bi-pencil-fill"></i> Send
                            </button>
                        </div>
                    </form>
                        @endcan
                    @endif
                    @include('layouts/comments')
                </section>
            </div>
        </div>
    </div>

@endsection
