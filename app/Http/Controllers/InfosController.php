<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\infos;
use App\Models\user;
use Illuminate\Support\Str;

class InfosController extends Controller
{
    public function index()
    {
        return view('dashboard.infos.index', [
            'infos' => infos::all(),
        ]);
    }

    public function index1()
    {
        return view('dashboard.admininfos.index', [
            'infos' => infos::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.infos.create', [
            'info' => infos::all(),
            'user' => user::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'=> 'required',
            'slug' => 'required|unique:infos',
            'status' => 'required',
        ]);


        infos::create($validatedData);

        return redirect('/dashboard/infos')->with('success', 'New post has been added!');
    }


    public function destroy(infos $info)
    {
        infos::destroy($info->id);

        return redirect('/dashboard/infos')->with('success', 'Post has been deleted!');
    }

}
