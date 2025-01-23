<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    checkingFlare();

    public function __invoke()
    {
        $applications = Application::published()->get()->sortByDesc('published_at');
        return view('welcome', compact('applications'));
    }
}
