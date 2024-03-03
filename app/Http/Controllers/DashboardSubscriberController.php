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

    public function edit()
    {
        return Inertia::render('Dashboard/Subscriber/TheSubscriberEdit');
    }
}
