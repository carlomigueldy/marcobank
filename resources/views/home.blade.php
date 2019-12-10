<?php 
    $role = Auth::user()->role; 
    $user = Auth::user();
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @elseif ($message = Session::get('error'))
                <div class="alert alert-danger">{{ $message }}</div>
            @endif
        
            <div class="card">
                <div class="card-header">Dashboard</div>

                @if ($role->id != 4)
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome to the Ironforge Bank!
                </div>
                @endif
                @if ($role->id == 4)
                <div class="card-body">
                    <div class="p-3">
                        Your current balance is <h4>Php {{ $user->account->balance }}</h4>
                    </div>

                    <form action="{{ route('accounts.accountWithdraw', $user->account->id) }}" method="post">
                        @csrf
                        <label for="withdraw">Withdraw</label>
                        <input type="number" name="amount" class="form-control">

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Withdraw</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
