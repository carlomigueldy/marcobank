@extends('layouts.app')

@section('content')
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
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
</div>
@stop