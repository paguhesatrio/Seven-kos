<?php

namespace App\Http\Controllers;

use App\Models\jenberita;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminNewsController extends Controller
{

    public function index()
    {
        return view('dashboard.news.index', [
            'news' => news::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.news.create', [
            'jenberita' => jenberita::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:500',
            'slug' => 'required|unique:news',
            'jenberita_id' => 'required',
            'image' => 'image|file|max:100000',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        news::create($validatedData);

        return redirect('/dashboard/news')->with('success', 'New post has been added!');
    }


    public function edit(news $news)
    {
        return view('dashboard.news.edit', [
            'news' => $news,
            'jenberita' => jenberita::all(),
        ]);
    }

    public function update(Request $request, news $news)
    {
        $rules = [
            'title' => 'required|max:500',
            'jenberita_id' => 'required',
            'image' => 'image|file|max:100000',
            'body' => 'required',
        ];

        if ($request->slug != $news->slug) {
            $rules['slug'] = 'required|unique:news';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        news::where('id', $news->id)->update($validatedData);

        return redirect('/dashboard/news')->with('success', 'news has been updated!');
    }

    public function destroy(news $news)
    {

        if ($news->image) {
            Storage::delete($news->image);
        }

        news::destroy($news->id);

        return redirect('/dashboard/news')->with('success', 'news has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(news::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
