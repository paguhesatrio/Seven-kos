<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\infos;

class infosuserController extends Controller
{
    public function index()
    {
        return view('dashboard.infosuser.index', [
            'infos' => infos::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}

