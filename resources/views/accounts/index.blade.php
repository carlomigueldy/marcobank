@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="float-left">
            <h3>Accounts</h3>
        </div>
        <div class="float-right">
            <a href="{{ route('accounts.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($accounts as $account)
            <tr>
                <td>{{ $account->user->name }}</td>
                <td>{{ $account->user->email }}</td>
                <td>Php {{ $account->balance }}</td>
                <td>
                    <a href="{{ route('accounts.withdrawView', $account->id) }}" class="btn btn-primary">Withdraw</a>
                    <a href="{{ route('accounts.depositView', $account->id) }}" class="btn btn-success">Deposit</a>
                    <a href="{{ route('accounts.destroy', $account->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
</div>
@stop