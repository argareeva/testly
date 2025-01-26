<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryShowResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::All();

        return CategoryShowResource::collection($categories);
    }

    public function show(int $id)
    {
        $category = Category::FindOrFail($id);

        return new CategoryShowResource($category);
    }
}
