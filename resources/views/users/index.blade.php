@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-primary">{{ $message }}</div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">{{ $message }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="float-left">
                <h3>Users</h3>
            </div>
            <div class="float-right">
                <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
            </div>
        </div>
        <table class="table text-center">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @if($user->role_id != 4)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        @if ($user->role_id != 1)
                        <td>
                            {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a> --}}
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @method('DELETE')
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endif
                @endforeach
            </tbody>    
        </table>
    </div>
@stop