<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    public function index()
    {
        $categories = Category::get();

        return view('user.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        $category = Category::create([
            'title' => $request->title,
        ]);

        session()->flash('success', 'New category [<span class="font-bold">'.$category->title.'</span>] created successfully');

        return redirect()->route('user.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        $this->isAuthorized($category);

        return view('user.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        $this->isAuthorized($category);

        return view('user.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        $category = Category::find($id);

        $this->isAuthorized($category);

        $category->update([
            'title' => $request->title,
        ]);

        session()->flash('success', 'Category [<span class="font-bold">'.$category->title.'</span>] updated successfully');

        return redirect()->route('user.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $this->isAuthorized($category);

        $category->delete();

        session()->flash('success', 'Category [<span class="font-bold">'.$category->title.'</span>] deleted successfully');

        return redirect()->route('user.categories.index');
    }

    private function isAuthorized(Category $category): void
    {
        if (auth()->user()->is_admin == 1) {
            return;
        }

        abort(401);
    }
}
