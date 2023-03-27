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
use App\Models\Village;

class DashboardPostController extends Controller
{

    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            'provinces' => Province::all(),
            'jenis' => Jenis::all(),
        ]);
    }

     public function getkabupaten(request $request){
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id',$id_provinsi)->get();

        $option = "<option>=====Pilih Kabupaten/Kota====</option>";
        foreach($kabupatens as $kabupaten){
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
        echo $option;
    }

    public function getkecamatan(request $request){
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id',$id_kabupaten)->get();

        $option = "<option>=====Pilih Kecamatan====</option>";
        foreach($kecamatans as $kecamatan){
            $option.="<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getdesa(request $request){
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id',$id_kecamatan)->get();

        $option = "<option>=====Pilih Desa/Kelurahan====</option>";
        foreach($desas as $desa){
            $option.= "<option value='$desa->id'>$desa->name</option>";
        }
        echo $option;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:500',
            'slug' => 'required|unique:posts',
            'jenis_id' => 'required',
            'alamat' => 'required|max:500',
            'image' => 'image|file|max:100000',
            'image2' => 'image|file|max:100000',
            'image3' => 'image|file|max:100000',
            'image4' => 'image|file|max:100000',
            'image5' => 'image|file|max:100000',
            'body' => 'required',
            'kamar' => 'required',
            'no_hp' => 'required',
            'maps' => 'required',
            'price' => 'required',
            //========================================== Tipe kamar
            'tipekamar' => 'required',
            'listrik'=> 'required',
            'air'=> 'required',
            //========================================== Fasilitas kamar
            'kamarmandi'=> 'required',
            'ac'=> 'required',
            'kasur'=> 'required',
            'lemari'=> 'required',
            'meja'=> 'required',
            //========================================== Fasilitas Umum
            'wifi'=> 'required',
            'jemur'=> 'required',
            'tamu'=> 'required',
            'dapur'=> 'required',
            //========================================== Fasilitas Umum
            'akses'=> 'required',
            'maks'=> 'required',
            'teman'=> 'required',
            'hewan'=> 'required',
            'user_id'=> 'required',
            'rekening'=> 'required',
            'bayar'=> 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
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

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('Berhasil Menambahkan Kost');
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'jenis' => jenis::all(),
            'user' => User::all(),
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all(),

        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'name' => 'required|max:500',
            'jenis_id' => 'required',
            'alamat' => 'required|max:500',
            'image' => 'image|file|max:100000',
            'image2' => 'image|file|max:100000',
            'image3' => 'image|file|max:100000',
            'image4' => 'image|file|max:100000',
            'image5' => 'image|file|max:100000',
            'body' => 'required',
            'kamar' => 'required',
            'no_hp' => 'required',
            'maps' => 'required',
            'price' => 'required',
            //========================================== Tipe kamar
            'tipekamar' => 'required',
            'listrik'=> 'required',
            'air'=> 'required',
            //========================================== Fasilitas kamar
            'kamarmandi'=> 'required',
            'ac'=> 'required',
            'kasur'=> 'required',
            'lemari'=> 'required',
            'meja'=> 'required',
            //========================================== Fasilitas Umum
            'wifi'=> 'required',
            'jemur'=> 'required',
            'tamu'=> 'required',
            'dapur'=> 'required',
            //========================================== Fasilitas Umum
            'akses'=> 'required',
            'maks'=> 'required',
            'teman'=> 'required',
            'hewan'=> 'required',
            'user_id'=> 'required',
            'rekening'=> 'required',
            'bayar'=> 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        if ($request->file('image2')) {
            if ($request->oldImage2) {
                Storage::delete($request->oldImage2);
            }
            $validatedData['image2'] = $request->file('image2')->store('post-images');
        }

        if ($request->file('image3')) {
            if ($request->oldImage3) {
                Storage::delete($request->oldImage3);
            }
            $validatedData['image3'] = $request->file('image3')->store('post-images');
        }

        if ($request->file('image4')) {
            if ($request->oldImage4) {
                Storage::delete($request->oldImage4);
            }
            $validatedData['image4'] = $request->file('image4')->store('post-images');
        }

        if ($request->file('image5')) {
            if ($request->oldImage5) {
                Storage::delete($request->oldImage5);
            }
            $validatedData['image5'] = $request->file('image5')->store('post-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    public function destroy(Post $post)
    {

        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
