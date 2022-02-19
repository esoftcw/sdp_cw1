<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public $roles = ['system-admin', 'center-admin', 'driver', 'rider', 'customer'];


    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->paginate();
        return view('users.index', compact('users'));
    }

    public function create(){
        $roles = $this->roles;
        $centers = Center::all();
        return view('users.form', compact('roles', 'centers'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        User::create($input);

        return redirect()->route('users.index')->with('success', 'Added Successfully');
    }

    public function edit(User $user){
        $roles = $this->roles;
        $centers = Center::all();
        return view('users.form', compact('user', 'roles', 'centers'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required'],
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }
        if ($request->center_id) {
            $user->centers()->sync($request->center_id);
        }

        $user->update($request->except(['password', 'center_id']));

        return redirect()->route('users.index')->with('success', 'Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
