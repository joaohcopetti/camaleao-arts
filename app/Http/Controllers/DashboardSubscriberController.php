<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardSubscriberController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Subscriber/TheSubscriber');
    }
}
