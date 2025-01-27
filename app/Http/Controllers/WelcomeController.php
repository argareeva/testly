<?php

namespace App\Http\Controllers;

use App\Models\Application;

class WelcomeController extends Controller
{

    public function __invoke()
    {
        $applications = Application::published()->get()->sortByDesc('published_at');

        return view('welcome')->with('applications', $applications);
    }
}
