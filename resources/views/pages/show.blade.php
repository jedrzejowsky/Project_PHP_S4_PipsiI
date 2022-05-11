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
                    <form method="POST" action="/post/{{ $post->slug }}/comments">
                        @csrf

                        <div class="comment p-2">
                            <p class="mb-3">
                                <img class="img-avatar me-2" src="https://i.pravatar.cc/150?u={{ auth()->id() }}"/>
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
                    @endif
                    {{--wyświetlenie wszystkich komentarzy--}}
{{--                    @if($post->comments->count() > 0)--}}
{{--                        <p class="h2 fw-bold mt-5 mb-3">{{ $post->comments->count() }} {{ $post->comments->count() > 1 ? 'Comments' : 'Comment'}}</p>--}}
{{--                        @foreach($post->comments as $comment)--}}

{{--                            <div class="flex-grow-1 flex-shrink-1 comment mb-3 p-2">--}}
{{--                                <div>--}}
{{--                                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                                        <p class="mb-1">--}}
{{--                                            <img class="img-avatar" src="https://i.pravatar.cc/150?u={{ $comment->user_id }}"/>--}}
{{--                                            {{ $comment->author->name }} <span class="small">- {{ date('d.m.Y', strtotime($comment->date)) }}</span>--}}
{{--                                        </p>--}}
{{--                                </div>--}}
{{--                                    <p class="mb-1">--}}
{{--                                        {{ $comment->content }}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        @endforeach--}}
{{--                    @endif--}}

                    @include('layouts/comments')
                </section>
            </div>
        </div>
    </div>

@endsection
