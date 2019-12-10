<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:users',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required',
        ]); 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'A user has been added.');
    }

    public function show($id)
    {
        $user = User::with('role')->where('id', $id)->first();

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with('role')->where('id', $id)->first();

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);
        
        $user = User::findOrFail($id);
        
        if ($request->password) {
            $user->password = $request->password;
        }

        if ($request->role_id) {
            $user->role_id = $request->role_id;
        }
        
        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect()->back()->with('success', 'A user has been updated.');
        } else {
            
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->delete()) {
            return redirect()->back()->with('success', 'A user has been deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Unable to delete this user.');
        }
    }
}
