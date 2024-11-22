<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::whereNotNull('published_at')->orderByDesc('published_at')->get();
        return view('applications.index')->with('applications', $applications);
    }

    public function show(int $id)
    {
        $application = Application::published()->where('id', $id)->first();
        if($application === null){
            abort(404);
        }
        return view('applications.show')->with('application', $application);
    }
}
