<?php $role = Auth::user()->role; ?>

<ul class="list-group">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action list-group-item-dark">Dashboard</a>
    @if ($role->id == 1)
        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action list-group-item-dark">Users</a>
    @endif
    @if ($role->id != 4 && $role->id != 3)
        <a href="{{ route('tellers.index') }}" class="list-group-item list-group-item-action list-group-item-dark">Tellers</a>
    @endif
    @if ($role->id <= 3)
        <a href="{{ route('accounts.index') }}" class="list-group-item list-group-item-action list-group-item-dark">Accounts</a>
    @endif
</ul>