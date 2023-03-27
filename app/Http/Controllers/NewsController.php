<?php

namespace App\Http\Controllers;

use App\Models\jenberita;
use App\Models\news;
use App\Models\User;
use Illuminate\Routing\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('jenberita')) {
            $jenberita = jenberita::firstWhere('slug', request('jenberita'));
            $title = ' in ' . $jenberita->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('blog', [
            "title" => "Semua Berita" . $title,
            "active" => 'blog',
            "news" => news::latest()->filter(request(['search','jenberita','author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(news $news)
    {
        return view('news', [
            "title" => "berita",
            "active" => 'blog',
            "news" => $news,
        ]);
    }
}
