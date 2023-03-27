<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminSemuaKosController extends Controller
{
    public function index()
    {
        return view('dashboard.semuakos.index', [
            'posts' => Post::all(),
        ]);

    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'jenis' => jenis::all(),
            'user' => User::all(),
        ]);
    }

}
