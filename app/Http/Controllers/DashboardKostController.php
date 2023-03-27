<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Category;
use App\Models\Kost;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use App\Models\kamar;

class DashboardKostController extends Controller
{
    public function index()
    {
        return view('dashboard.kost.index', [
            'kosts' => kost::where('user_id', auth()->user()->id)->get(),
        ]);
    }


    public function create()
    {
        return view('dashboard.kost.create', [
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
            'slug' => 'required|unique:kosts',
            'jenis_id' => 'required',
            'alamat' => 'required|max:500',
            'user_id'=> 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
            'image' => 'image|file|max:100000',
            'image2' => 'image|file|max:100000',
            'image3' => 'image|file|max:100000',
            'image4' => 'image|file|max:100000',
            'image5' => 'image|file|max:100000',
            'body' => 'required',
            'no_hp' => 'required',
            'maps' => 'required',
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
            $validatedData['image5'] = $request->file('image5')->store('post-images');}

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Kost::create($validatedData);

        return redirect('/dashboard/kamar/create')->with('Berhasil Menambahkan Kost, Silahkan Tambahkan Kamar');
    }


    public function edit(Kost $kost)
    {
        return view('dashboard.kost.edit', [
            'kost' => $kost,
            'user' => User::all(),
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all(),
            //     $regencies = Regency::all(),
            //  $districts = District::all(),
            //  $villages = Village::all(),
            'jenis' => Jenis::all(),
        ]);
    }

    public function update(Request $request, Kost $kost)
    {
        $rules = [
            'name' => 'required|max:500',
            'slug' => 'required|unique:kosts',
            'jenis_id' => 'required',
            'alamat' => 'required|max:500',
            'user_id'=> 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
            'image' => 'image|file|max:100000',
            'image2' => 'image|file|max:100000',
            'image3' => 'image|file|max:100000',
            'image4' => 'image|file|max:100000',
            'image5' => 'image|file|max:100000',
            'body' => 'required',
            'no_hp' => 'required',
            'maps' => 'required',
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
        ];

        if ($request->slug != $kost->slug) {
            $rules['slug'] = 'required|unique:kosts';
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

        Kost::where('id', $kost->id)->update($validatedData);

        return redirect('/dashboard/kost')->with('Berhasil Mengupdate Kost');
    }

    public function destroy(Kost $kost)
    {

        if ($kost->image) {
            Storage::delete($kost->image);
        }

        Kost::destroy($kost->id);

        return redirect('/dashboard/kost')->with('Berhasil Menghapus Kost');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kost::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }


}
