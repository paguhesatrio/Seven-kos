<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProvinsiController extends Controller
{
    public function index()
    {

        return view('dashboard.provinces.index', [
            'province' => Province::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.provinces.create', [
            'province' => Province::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:500',
            'slug' => 'required|unique:provinces',
            'image' => 'image|file|max:100000',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Province::create($validatedData);

        return redirect('/dashboard/provinces')->with('success', 'New post has been added!');
    }


    public function edit(Province $province)
    {
        return view('dashboard.provinces.edit', [
            'province' => $province,
        ]);
    }

    public function update(Request $request,Province $province)
    {
        $rules = [
            'name' => 'required|max:500',
            'image' => 'image|file|max:100000',
        ];

        if ($request->slug != $province->slug) {
            $rules['slug'] = 'required|unique:provinces';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Province::where('id', $province->id)->update($validatedData);

        return redirect('/dashboard/provinces')->with('success', 'Post has been updated!');
    }

    public function destroy(Province $Province)
    {
        if ($Province->image) {
            Storage::delete($Province->image);
        }

        Province::destroy($Province->id);

        return redirect('/dashboard/categories')->with('success', 'Post has been deleted!');
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Province::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
