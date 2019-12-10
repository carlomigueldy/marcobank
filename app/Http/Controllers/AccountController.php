<?php

namespace App\Http\Controllers;

use App\User;
use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::with('users')->get();

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            ]);

            Account::create([
                'user_id' => $user->id,
                'balance' => $request->balance ? $request->balance : 0,
            ]);
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'The attempt of adding an account failed.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);
        $account->user;

        return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        $account->user;

        return view('accounts.edit', compact('account'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);

        if ($account->delete()) {
            return redirect()->back()->with('success', 'An Account was deleted successfully.');
        }
    }
}
