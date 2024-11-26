<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ApplicationPublishController extends Controller
{
    public function __invoke(int $id, Request $request)
    {
        $application = \App\Models\Application::findOrFail($id);
        $application->authorized(auth()->user());
        $application->update([
            'published_at' => now(),
        ]);
        return redirect()->back();
    }
}
