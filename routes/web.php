<?php

use App\Http\Controllers\AdminAnggotaController;
use App\Http\Controllers\AdminHasilController;
use App\Http\Controllers\AdminJadwalController;
use App\Http\Controllers\AdminOlahragaController;
use App\Http\Controllers\AdminOrganisasiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AnggotaOrganisasiController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Hasil;
use App\Models\Jadwal;
use App\Models\Olahraga;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    
    return view('home',[
        "title" => "Home",
        "active" => 'home'
    ]);
  
});

Route::get('/about', function () {
    return view('about',[
"title" => "About",
"active" => "about",
"name" => "OYA COMPANY",
"desc" => "Perusahaan OYA merupakan sebuah perusahaan yang menaungi beberapa organisasi
olahraga di Indonesia.",
]
    );
  
});

Route::get('/organisasis', function(){
    return view('/organisasis',[
        'title' =>'Organisasi',
        'active' => 'organisasis',
        'organisasis' =>Organisasi::all()
    ]);
});


Route::get('/anggotas',[AnggotaController::class, 'index']); 

Route::get('/jadwals', function(){
    return view('/jadwals',[
        'title' =>'Jadwal Acara',
    'active' => 'jadwals',
        'jadwals' =>Jadwal::all()
    ]);
});






Route::get('/hasils',[HasilController::class, 'index']); 
Route:: get('/hasils/{hasil:id}',[HasilController::class, 'show'] );


Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);



Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);




Route::get('/dashboard', function() {
   return view('dashboard.index'); 
})->middleware('auth');


Route::resource('/dashboard/organisasis', AdminOrganisasiController::class)->middleware('admin');
Route::get('/dashboard/organisasi/checkSlug',[AdminOrganisasiController::class,'checkSlug'])->middleware('admin');


Route::resource('/dashboard/anggotas', AdminAnggotaController::class)->middleware('admin');
Route::get('/dashboard/anggota/checkSlug',[AdminAnggotaController::class,'checkSlug']);




Route::resource('/dashboard/jadwals', AdminJadwalController::class)->middleware('admin');

Route::resource('/dashboard/hasils', AdminHasilController::class)->middleware('admin');

Route::resource('/dashboard/olahragas', AdminOlahragaController::class)->middleware('admin');
Route::get('/dashboard/olahraga/checkSlug',[AdminOlahragaController::class,'checkSlug'])->middleware('admin');


