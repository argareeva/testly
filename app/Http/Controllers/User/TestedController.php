<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;

class TestedController extends Controller
{
    public function index()
    {
        $applications = Application::published()->orderByDesc('published_at')->get();
        return view('user.tested.index')->with('applications', $applications);
    }
}
