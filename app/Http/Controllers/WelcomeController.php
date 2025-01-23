<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function __invoke()
    {
        $applications = Application::published()->get()->sortByDesc('published_at');

        $applications ->checkingFlare();
        return view('welcome', compact('applications'));
    }
}
