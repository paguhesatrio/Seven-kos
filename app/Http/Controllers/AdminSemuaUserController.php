<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Hash;

class AdminSemuaUserController extends Controller
{
    public function index()
    {
        return view('dashboard.semuauser.index', [
            'users' => user::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.semuauser.create', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:4|max:255',
            'is_admin' => 'required|max:1',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/semuauser')->with(['success' => 'Registration successfull! Please Login']);
    }

}
