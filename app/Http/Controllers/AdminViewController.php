<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class AdminViewController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index', [
            "news" => news::latest()->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString(),
        ]);
    }
}
