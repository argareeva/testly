<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function show(int $id)
    {
        $application = Application::published()->where('id', $id)->first();
        if($application === null){
            abort(404);
        }
        return view('applications.show')->with('application', $application);
    }
}
