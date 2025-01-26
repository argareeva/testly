<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationIndexResource;
use App\Http\Resources\ApplicationShowResource;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();

        return ApplicationIndexResource::collection($applications);
    }

    public function show(int $id)
    {
        $application = Application::with(['author', 'categories'])->findOrFail($id);

        return new ApplicationShowResource($application);
    }
}
