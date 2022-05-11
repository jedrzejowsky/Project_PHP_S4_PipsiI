@extends('layouts/index')

@section('title', "Edit user - GryOffline")

@section('content')
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card-body p-md-5">

                    <form method="POST" action="{{ route('admin.user', $user->id) }}" enctype="multipart/form-data">
                        @csrf

                        {{ method_field('PUT') }}

                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mb-4">
                            <p class="h1 fw-bold mt-4">Edit user</p>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="name"  placeholder="name" value="{{ $user->name }}" readonly="readonly"/>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <input class="form-control" type="text" name="email"  placeholder="email" value="{{ $user->email }}" readonly="readonly"/>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 col-lg-6">
                            <div class="form-outline flex-fill mb-0">
                                <select class="form-select" aria-label="Default select example" name="role_id">
                                    <option value="1" {{ old('name',$user->role)=='admin' ? 'selected' : ''  }}>Admin</option>
                                    <option value="2" {{ old('name',$user->role)=='editor' ? 'selected' : ''  }}>Editor</option>
                                    <option value="3" {{ old('name',$user->role)=='user' ? 'selected' : ''  }}>User</option>
                                </select>
                            </div>
                        </div>

                        <button class="button btn btn-primary btn-md" type="submit">
                            <i class="bi bi-pencil-fill"></i> Update
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
