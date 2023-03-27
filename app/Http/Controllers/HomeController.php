<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Province;
use App\Models\jenberita;
use App\Models\news;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home', [
            "title" => "Home",
            "active" => "Home",
            // "provinces" => Province::all(),
            "provinces" => Province::paginate(4),
            "jenberita" => jenberita::all(),
            "news" => news::latest()->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString(),
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);
    }
}
