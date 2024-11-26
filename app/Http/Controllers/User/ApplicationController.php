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
        $applications = Application::where('author_id', auth()->user()->id)->get();

        if(auth()->user()->is_admin){
            $applications = Application::get();
        } else {
            $applications = Application::where('author_id', auth()->user()->id)->get();
        }

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
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'file', 'max:1024'],
        ]);

        $application = Application::create([
            'name' => $request->name,
            'description' => $request->description,
            'author_id' => auth()->user()->id,
        ]);

        if ($request->has('image')) {

            // Remove existing image if any
            if ($application->hasMedia('images')) {
                $application->clearMediaCollection('images');
            }

            // Add the new image
            $application->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }

        session()->flash('success', 'New application [<span class="font-bold">'.$application->name.'</span>] created successfully');

        return redirect()->route('user.applications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = Application::findOrFail($id);

        $this->isAuthorized($application);

        return view('user.applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = Application::find($id);

        $this->isAuthorized($application);

        return view('user.applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'file', 'max:1024'],
        ]);

        $application = Application::find($id);


        $this->isAuthorized($application);

        $application->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->has('image')) {

            // Remove existing image if any
            if ($application->hasMedia('images')) {
                $application->clearMediaCollection('images');
            }

            // Add the new image
            $application->addMediaFromRequest('image')
                ->toMediaCollection('images');
        }

        session()->flash('success', 'Application [<span class="font-bold">'.$application->name.'</span>] updated successfully');

        return redirect()->route('user.applications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);

        $this->isAuthorized($application);

        $application->delete();

        session()->flash('success', 'Application [<span class="font-bold">'.$application->name.'</span>] deleted successfully');

        return redirect()->route('user.applications.index');
    }

    private function isAuthorized(Application $application): void
    {
        if($application->author_id != auth()->user()->id) {
            abort(401);
        }
    }
}
