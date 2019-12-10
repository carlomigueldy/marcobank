<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with('user')->get();

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Deposits an amount of cash to account balance.
     * 
     * @param Integer $id
     */
    public function accountDeposit(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required',
        ]);
        
        $account = Account::findOrFail($id);

        $account->balance += $request->balance;
        $account->save();

        return redirect()->back()->with('success', 'The amount was deposited.');
    }

    /**
     * Withdraws cash amount from account balance.
     * 
     * @param Integer $id
     */
    public function accountWithdraw(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required',
        ]);
        
        $account = Account::findOrFail($id);

        $account->balance -= $request->balance;
        $account->save();

        return redirect()->back()->with('success', 'The amount was withdrawn.');
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => 4,
            ]);

            Account::create([
                'user_id' => $user->id,
                'balance' => $request->balance ? $request->balance : 0,
            ]);

            return redirect()->back()->with('success', 'An Account was added.');
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'The attempt of adding an account failed.');
        }
    }

    public function show($id)
    {
        $account = Account::find($id);
        $account->user;

        return view('accounts.show', compact('account'));
    }

    public function edit($id)
    {
        $account = Account::find($id);
        $account->user;

        return view('accounts.edit', compact('account'));
    }

    public function destroy($id)
    {
        $account = Account::find($id);

        if ($account->delete()) {
            return redirect()->back()->with('success', 'An Account was deleted successfully.');
        }
    }
}
