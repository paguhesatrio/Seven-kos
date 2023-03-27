<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;


class AdminSemuaPembayaran extends Controller
{
    public function index()
    {
        return view('dashboard.semuapembayaran.index', [
            'pembayarans' =>  pembayaran::all(),
        ]);
    }
}
