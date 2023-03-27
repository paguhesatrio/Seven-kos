<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    public function index()
    {

        return view('dashboard.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:500',
            'slug' => 'required|unique:categories',
            'image' => 'image|file|max:100000',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New post has been added!');
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show', [
            'category' => $category,
            'categories' => Category::all(),
        ]);
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:500',
            'image' => 'image|file|max:100000',
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Post has been updated!');
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::delete($category->image);
        }

        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
