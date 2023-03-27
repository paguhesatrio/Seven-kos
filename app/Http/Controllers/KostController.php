<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\keranjang;
use App\Models\Post;
use App\Models\kamar;
use App\Models\Kost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class KostController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('kosts', [
            "title" => "Semua Kos" . $title,
            "active" => 'kosts',
            "kosts" => Kost::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Kost $kost, User $user)
    {
        return view('Kost', [
            "title" => "Koskosan",
            "active" => 'Kost',
            "kost" => $kost,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'slug' => ['required','max:255', 'unique:keranjangs'],
            'kost_id' => 'required|max:255',
        ]);

        keranjang::create($validatedData);

        return redirect('/dashboard/keranjang')->with(['success' => 'Kos berhasil ditambahkan di favorit']);

    }
}
