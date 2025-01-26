<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;
use App\Models\User;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::with('applications')->get();

        return AuthorResource::collection($authors);
    }

    public function show(int $id)
    {
        $author = User::FindOrFail($id);

        return new AuthorResource($author);
    }
}
