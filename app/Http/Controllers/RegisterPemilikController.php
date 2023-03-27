<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPemilikController extends Controller
{
    public function index()
    {
        return view('registerpemilik.index', [
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
            'is_pemilik' => 'required|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/loginpemilik')->with(['success' => 'Registration successfull! Please Login']);
    }
}
