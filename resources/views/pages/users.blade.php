@extends('layouts.index')

@section('title', 'Manage Users - GryOffline')

@section('content')
        <table class="table table-sm table-dark table-bordered text-center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Verified</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @if($users->count() > 0)
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        @if($user->email_verified_at === null)
                            <td>
                                <i class="bi bi-x-lg" style="color: red;"></i>
                            </td>
                        @else
                            <td>
                                <i class="bi bi-check-lg" style="color: lawngreen;"></i>
                            </td>
                        @endif
                        <td>
                            <a href=" {{route('admin.user.edit', $user->id) }}">
                            <button class=" btn-primary"><i class="bi bi-pencil-fill"></i></button>
                        </a>
                        </td>
                        <form method="POST" action="{{ route('admin.user.destroy', $user->id) }}">
                            @csrf
                            {{ method_field('DELETE') }}
                            <td><button class=" btn-danger"><i class="bi bi-trash-fill" onclick="return confirm('Are you sure?')"></i></button></td>
                        </form>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
@endsection
