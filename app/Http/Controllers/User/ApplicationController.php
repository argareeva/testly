<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all();

        return view('user.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'name' => ['required', 'string', 'min:5', 'max:255'],
//            'description' => ['required', 'string'],
//        ]);

        $application = Application::create([
            'name' => $request->name,
            'description' => $request->description,
            'author_id' => 1,
        ]);

        session()->flash('success', 'New application [<span class="font-bold">'.$application->name.'</span>] created successfully');

        return redirect()->route('user.applications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = Application::findOrFail($id);

        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::find($id);

        return view('user.applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        $request->validate([
//            'name' => ['required', 'string', 'min:5', 'max:255'],
//            'description' => ['required', 'string'],
//        ]);

        $application = Application::find($id);

        $application->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        session()->flash('success', 'Application [<span class="font-bold">'.$application->name.'</span>] updated successfully');

        return redirect()->route('user.applications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);

        $application->delete();

        session()->flash('success', 'Application [<span class="font-bold">'.$application->name.'</span>] deleted successfully');

        return redirect()->route('user.applications.index');
    }
}
