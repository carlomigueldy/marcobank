@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">{{ $message }}</div>
    @endif

    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="card">
        <div class="card-header">Add Account</div>
        <div class="card-body">
            <form action="{{ route('accounts.store') }}" method="post">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">

                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control">

                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">

                <label for="balance">Balance</label>
                <input type="number" name="balance" class="form-control">

                <div class="mt-5">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Add</button>
                </div>
            </form>
        </div>
    </div>
@stop