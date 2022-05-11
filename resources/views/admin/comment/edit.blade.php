@extends('layouts/index')

@section('title', "Edit comment - GryOffline")

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card-body p-md-5">

                    <form method="POST" action="{{ route('comment.edit', $comment->id) }}" enctype="multipart/form-data">
                        @csrf

                        {{ method_field('PUT') }}

                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mb-4">
                            <p class="h1 fw-bold mt-4">Edit comment</p>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="name"  placeholder="name" value="{{ $comment->author->name }}" readonly="readonly"/>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-8">
                            <div class="form-outline flex-fill mb-0">
                                <textarea class="form-control" rows="5" placeholder="Content" name="content">{{ $comment->content }}</textarea>
                            </div>
                        </div>

                        <button class="button btn btn-primary btn-md">
                            <i class="bi bi-pencil-fill"></i> Update
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
