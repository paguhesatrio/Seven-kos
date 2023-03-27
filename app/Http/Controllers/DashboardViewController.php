<?php

namespace App\Http\Controllers;

use App\Models\jenberita;
use App\Models\news;
use Illuminate\Http\Request;

class DashboardViewController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.index', [
            "news" => news::latest()->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString(),
        ]);
    }
}
