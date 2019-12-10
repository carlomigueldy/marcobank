<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TellerController extends Controller
{
    public function index()
    {
        $tellers = User::where('role_id', 3)->get();

        return view('tellers.index', compact('tellers'));
    }

    public function create()
    {
        return view('tellers.create');
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
                'role_id' => 3,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->back()->with('success', 'A Teller was added.');
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'The attempt of adding a Teller failed.');
        }
    }

    public function show($id)
    {
        $teller = User::find($id);
        $teller->user;

        return view('tellers.show', compact('teller'));
    }

    public function edit($id)
    {
        $teller = User::find($id);
        $teller->user;

        return view('tellers.edit', compact('teller'));
    }

    public function destroy($id)
    {
        $teller = User::find($id);

        if ($teller->delete()) {
            return redirect()->back()->with('success', 'A Teller was deleted successfully.');
        }
    }
}
