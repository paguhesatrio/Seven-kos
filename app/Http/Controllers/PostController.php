<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\District;
use App\Models\kamar;
use App\Models\Regency;
use App\Models\village;
use App\Models\keranjang;
use App\Models\pembayaran;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('province')) {
            $province = province::firstWhere('slug', request('province'));
            $title = ' in ' . $province->name;
        }

        if (request('regency')) {
            $regency = Regency::firstWhere('name', request('regency'));
            $title = ' in ' . $regency->name;
        }

        if (request('district')) {
            $district = district::firstWhere('name', request('district'));
            $title = ' in ' . $district->name;
        }

        if (request('village')) {
            $village = village::firstWhere('name', request('village'));
            $title = ' in ' . $village->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "Semua Kos" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'province', 'regency', 'district', 'village','author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post, User $user, kamar $kamar)
    {
        return view('post', [
            "title" => "Koskosan",
            "active" => 'Kos',
            "post" => $post,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'slug' => ['required','max:255', 'unique:keranjangs'],
            'post_id' => 'required|max:255',
        ]);

        keranjang::create($validatedData);

        return redirect('/dashboard/keranjang')->with(['success' => 'Kos berhasil ditambahkan di favorit']);

    }

    public function store1(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'slug' => ['required','max:255', 'unique:pembayarans'],
            'post_id' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        pembayaran::create($validatedData);

        return redirect('/dashboard/pembayaran')->with(['success' => 'Pemesanan Berhasil, Lanjutkan ke pembayaran']);
    }
}
