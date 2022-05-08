@extends('layouts/index')

@section('title', "Edit post id: $post->id - GryOffline")

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card-body p-md-5">

                    <form method="POST" action="{{ route('admin.post.edit', $post->id) }}" enctype="multipart/form-data">
                        @csrf

                        {{ method_field('PUT') }}

                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mb-4">
                            <p class="h1 fw-bold mt-4">Edit post</p>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="title"  placeholder="Title" value="{{ $post->title }}"/>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <label class="h5 fw-bold" for="new_image">Image:</label>
                                <input class="form-control" type="file" name="image" id="new_image"/>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-8">
                            <div class="form-outline flex-fill mb-0">
                                <textarea class="form-control" rows="5" placeholder="Content" name="content">{{ $post->content }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 mb-lg-4">
                            <button class="button btn btn-primary btn-md">Update</button>
                        </div>

                    </form>

                    <form method="POST" action=" {{ route('admin.post.delete', $post->id) }}">
                        @csrf

                        {{ method_field('DELETE') }}

                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mb-4 mt-5">
                            <p class="h1 fw-bold mt-4">Delete post</p>
                        </div>

                        <div class="mb-3 mb-lg-4">
                            <button class="button btn btn-danger btn-md" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i>
                                Delete
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
