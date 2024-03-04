<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    public function show()
    {
        return Inertia::render('User/TheUser', [
            'user' => new UserResource(Auth::user())
        ]);
    }

    public function edit()
    {
        return Inertia::render('User/TheUserEdit', [
            'user' => new UserResource(Auth::user())
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::user())],
            'password' =>  $request->filled('password') ? ['required', 'confirmed'] : [],
            'password_confirmation' => $request->filled('password') ? ['required'] : []
        ]);

        Auth::user()->update($request->except(['password']));

        return redirect()->route('users.account');
    }

    public function destroy()
    {
        $user = Auth::user();

        $user->delete();

        return redirect()->route('home');
    }
}
