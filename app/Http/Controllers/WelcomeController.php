<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $applications = Application::all();
        //return view('welcome') -> with('applications', $applications);
        return view('welcome', compact('applications'));
    }
}
