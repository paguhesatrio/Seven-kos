<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\kamar;
use App\Http\Requests\StorekamarRequest;
use App\Http\Requests\UpdatekamarRequest;
use App\Models\Kost;
use App\Models\Jenis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KamarController extends Controller
{

    public function index()
    {
        return view('dashboard.kamar.index', [
            'kamars' => kamar::where('user_id', auth()->user()->id)->get(),
        ]);
    }
    public function create()
    {
        return view('dashboard.kamar.create', [
            'kosts' => Kost::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:500',
            'slug' => 'required|unique:kamars',
            'kost_id' => 'required',
            'image' => 'image|file|max:100000',
            'image2' => 'image|file|max:100000',
            'image3' => 'image|file|max:100000',
            'image4' => 'image|file|max:100000',
            'image5' => 'image|file|max:100000',
            'harga' => 'required',
            'kamar'=> 'required',
            'ukuran' => 'required|max:500',
            'listrik'=> 'required',
            'air'=> 'required',
            //========================================== Fasilitas kamar
            'kamarmandi'=> 'required',
            'ac'=> 'required',
            'kasur'=> 'required',
            'lemari'=> 'required',
            'meja'=> 'required',
            'bayar'=> 'required',
            'user_id' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        if ($request->file('image2')) {
            $validatedData['image2'] = $request->file('image2')->store('post-images');
        }

        if ($request->file('image3')) {
            $validatedData['image3'] = $request->file('image3')->store('post-images');
        }

        if ($request->file('image4')) {
            $validatedData['image4'] = $request->file('image4')->store('post-images');
        }

        if ($request->file('image5')) {
            $validatedData['image5'] = $request->file('image5')->store('post-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        kamar::create($validatedData);

        return redirect('/dashboard/kamar')->with('kamar berhasil di tambahkan');
    }


    public function destroy(kamar $kamar)
    {

        if ($kamar->image) {
            Storage::delete($kamar->image);
        }

        kamar::destroy($kamar->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kost::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }


}
