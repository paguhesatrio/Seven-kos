<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\pembayaran;
use App\Models\Village;

class pembayaranController extends Controller
{
    public function index()
    {
        return view('dashboard.pembayaran.index', [
            'pembayaran' => pembayaran::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function edit(pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.edit', [
            'pembayaran' => $pembayaran,
        ]);
    }

    public function update(Request $request, pembayaran $pembayaran)
    {
        $rules = [
            'image' => 'image|file|max:100000',
            'user_id' => 'required|max:500',
            'status' => 'required|max:500',

        ];

        if ($request->slug != $pembayaran->slug) {
            $rules['slug'] = 'required|unique:pembayarans';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        pembayaran::where('id', $pembayaran->id)->update($validatedData);

        return redirect('/dashboard/pembayaran')->with('success', 'news has been updated!');
    }


    public function destroy(pembayaran $pembayaran)
    {

        if ($pembayaran->image) {
            Storage::delete($pembayaran->image);
        }

        pembayaran::destroy($pembayaran->id);

        return redirect('/dashboard/pembayaran')->with('success', 'pembayaran has been deleted!');
    }



}
