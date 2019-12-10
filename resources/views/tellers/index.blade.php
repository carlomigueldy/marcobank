@extends('layouts.app')

@section('content')
<div class="card bg-dark text-white">
    <div class="card-body">
        <div class="float-left">
            <h3>Tellers</h3>
        </div>
        <div class="float-right">
            <a href="{{ route('tellers.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
    <table class="table text-center text-white">
        <thead>
            <th>Name</th>
            <th>Email</th>
            {{-- <th>Actions</th> --}}
        </thead>
        <tbody>
            @foreach($tellers as $teller)
            <tr>
                <td>{{ $teller->name }}</td>
                <td>{{ $teller->email }}</td>
                {{-- <td>
                    <a href="{{ route('tellers.edit', $teller->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('tellers.destroy', $teller->id) }}" class="btn btn-danger">Delete</a>
                </td> --}}
            </tr>
            @endforeach
        </tbody>    
    </table>
</div>
@stop