@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">{{ $message }}</div>
    @endif
    <div class="card">
        <div class="card-header">Deposit</div>
        <div class="card-body">
            <form action="{{ route('accounts.accountDeposit', $account->id) }}" method="post">
                @csrf
                <div class="p-3">
                    <div><b>Account #:</b> <span>{{ $account->id }}</span></div>
                    <div><b>Account Holder:</b> <span>{{ $account->user->name }}</span></div>
                    <div><b>Balance:</b> <span>Php {{ $account->balance }}</span></div>
                </div>
                <label for="amount">Amount to Deposit</label>
                <input type="number" name="amount" class="form-control">

                <div class="mt-5">
                    <button type="submit" class="btn btn-success">Deposit Cash</button>
                </div>
            </form>
        </div>
    </div>
@stop