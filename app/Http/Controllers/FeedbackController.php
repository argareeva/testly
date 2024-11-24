<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Application;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Show the feedback form for a specific application.
     */
    public function create(Application $application)
    {
        return view('feedback.create', compact('application'));
    }

    /**
     * Store feedback in the database.
     */
    public function store(Request $request, Application $application)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'feedback' => ['required', 'string', 'max:1000'],
        ]);

        $feedback = Feedback::create([
            'application_id' => $application->id,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->feedback,
        ]);

        session()->flash('success', 'Your feedback for the application [<span class="font-bold">'.$feedback->name.'</span>] has been submitted successfully.');

        return redirect()->route('applications.show', ['application' => $application]);
    }
}
