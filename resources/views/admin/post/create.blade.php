@extends('layouts/index')

@section('title', "Create post - GryOffline")

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card-body p-md-5">

                    <form method="POST" action="{{ route('admin.post.create') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mb-4">
                            <p class="h1 fw-bold mt-4">Create new post</p>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title"  placeholder="Title" value="{{ old('title') }}"/>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <label class="h5 fw-bold" for="new_image">Image:</label>
                                <input class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" type="file" name="image" id="new_image"/>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-8">
                            <div class="form-outline flex-fill mb-0">
                                <textarea class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" rows="5" placeholder="Content" name="content">{{ old('content') }}</textarea>
                            </div>
                        </div>

                        <a href=" {{ route('home') }}">
                            <button class="button btn btn-secondary btn-md">Create post</button>
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
