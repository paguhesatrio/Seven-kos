<?php

use App\Http\Controllers\DashboardViewController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminSemuaKosController;
use App\Http\Controllers\AdminSemuaUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginPemilikController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterPemilikController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DashboardKostController;
use App\Http\Controllers\AdminProvinsiController;
use App\Http\Controllers\AdminSemuaPembayaran;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\infosuserController;
use App\Http\Controllers\KamarViewController;
use App\Http\Controllers\pembayaranController;
use App\Models\Province;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [HomeController::class, 'index']);

Route::get('/pusatbantuan', function () {
    return view('pusatbantuan', [
        "title" => "Pusat Bantuan",
        "active" => "pusatbantuan",
    ]);
});
//=================================================================================================== blog
Route::get('/blog', [NewsController::class, 'index']);

Route::get('blog/{news:slug}', [NewsController::class, 'show']);
//===================================================================================================== syarat

Route::get('/syarat', function () {
    return view('syarat', [
        "title" => "Syarat dan Ketentuan",
        "active" => "syarat",
    ]);
});

Route::get('/dashboard/layouts/newsidebar', function () {
    return view('dashboard.layouts.newsidebar', [
        "title" => "newsidebar",
        "active" => "syarat",
    ]);
});
//======================================================================================================== about
Route::get('/about', function () {
    return view('about', [
        "title" => "Tentang",
        "active" => "about",
    ]);
});

//============================================================================== halaman single post

Route::get('/jenis', function () {
    return view('jenis', [
        "title" => "Area Kos Sesuai Gender",
        "active" => "jenis",
    ]);
});

//================================================================================================== login dan register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
//================================================================================================== register pemilik
Route::get('/loginpemilik', [LoginPemilikController::class, 'index'])->name('loginpemilik')->middleware('guest');
Route::post('/loginpemilik', [LoginPemilikController::class, 'authenticate']);

Route::get('/registerpemilik', [RegisterPemilikController::class, 'index'])->middleware('guest');
Route::post('/registerpemilik', [RegisterPemilikController::class, 'store']);
//========================================================================================================== dashboard
Route::get('/dashboard', [DashboardViewController::class, 'index'])->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

//========================================================================================================= categori admin
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');


//========================================================================================================= news admin
Route::get('/dashboard/news/checkSlug', [AdminNewsController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/news', AdminNewsController::class)->middleware('admin');
//========================================================================================================= semua kos admin
Route::get('/dashboard/semuakos/checkSlug', [AdminSemuaKosController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/semuakos', AdminSemuaKosController::class)->middleware('admin');
//========================================================================================================= semua user admin
Route::get('/dashboard/semuauser/checkSlug', [AdminSemuaUserController::class, 'checkSlug'])->middleware('superadmin');

Route::resource('/dashboard/semuauser', AdminSemuaUserController::class)->middleware('superadmin');

Route::get('/dashboard/keranjang/checkSlug', [KeranjangController::class, 'checkSlug'])->middleware(['auth']);
Route::resource('/dashboard/keranjang', KeranjangController::class)->middleware(['auth']);

// ===================================================================================================================================


Route::post('/getkabupaten', [DashboardKostController::class,'getkabupaten'])->name('getkabupaten');
Route::post('/getkecamatan', [DashboardKostController::class,'getkecamatan'])->name('getkecamatan');
Route::post('/getdesa', [DashboardKostController::class,'getdesa'])->name('getdesa');

Route::get('/dashboard/kamar/checkSlug', [KamarController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/kamar', KamarController::class)->middleware('auth');

Route::get('/dashboard/provinces/checkSlug', [AdminProvinsiController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/provinces', AdminProvinsiController::class)->middleware('admin');

Route::get('/provinces', function () {
    return view('provinces', [
        "title" => "Area Kos Terpopuler",
        "provinces" => Province::all(),
        "active" => "provinces",
    ]);
});

Route::get('/kamars', [KamarViewController::class, 'index']);

Route::get('kamars/{kamar:slug}', [KamarViewController::class, 'show'])->middleware('auth');

Route::post('kamars', [KamarViewController::class, 'store']);

//======================================================================================================== post

Route::get('/posts', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show'])->middleware('auth');

Route::post('posts', [PostController::class, 'store']);

Route::post('posts1', [PostController::class, 'store1']);


Route::get('/dashboard/pembayaran/checkSlug', [pembayaranController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/pembayaran', pembayaranController::class)->middleware('auth');

Route::get('/dashboard/semuapembayaran/checkSlug', [AdminSemuaPembayaran::class, 'checkSlug'])->middleware('admin');

Route::resource('/dashboard/semuapembayaran', AdminSemuaPembayaran::class)->middleware('admin');

Route::get('/dashboard/infos/checkSlug', [InfosController::class, 'checkSlug'])->middleware('admin');

Route::resource('/dashboard/infos', InfosController::class)->middleware('admin');


Route::get('/dashboard/infosuser/checkSlug', [infosuserController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/infosuser', infosuserController::class)->middleware('auth');
