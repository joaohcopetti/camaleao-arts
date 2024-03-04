<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardSubscriberController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Subscriber/TheSubscriber', [
            'users' => UserResource::collection(
                User::all()
            )
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Subscriber/TheSubscriberCreate');
    }

    public function store(SubscriberRequest $request)
    {
        $user = User::create($request->all());
        $user->assignRole(Role::SUBSCRIBER);

        return redirect()->route('dashboard.subscribers.index');
    }

    public function edit(User $user)
    {
        return Inertia::render('Dashboard/Subscriber/TheSubscriberEdit', [
            'user' => $user
        ]);
    }

    public function patch(SubscriberRequest $request, User $user)
    {
        $user->update($request->except(['password']));

        if ($request->filled('password')) {
            $user->update(['password' => $request->password]);
        }

        return redirect()->route('dashboard.subscribers.index');
    }
}
