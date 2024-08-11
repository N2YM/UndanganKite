<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Audio\AudioController;
use App\Http\Controllers\Admin\Dashboard\HomeController;
use App\Http\Controllers\User\Profile\ProfileController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\AkunPengguna\AkunController;
use App\Http\Controllers\User\Dashboard\DashboardController;
use App\Http\Controllers\Admin\ProfAdmin\ProfAdminController;
use App\Http\Controllers\Admin\SampelUndangan\SampelController;
use App\Http\Controllers\User\TambahUndangan\UndanganController;
use App\Http\Controllers\Admin\TambahTemplate\TemplateController;
use App\Http\Controllers\Admin\DaftarTemplate\DaftarTemplateController;
use App\Http\Controllers\User\TambahUndangan\PilihTemplate\PilihTemplateController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::middleware('guest')->group(function (){
Auth::routes(['login' => false, 'register' => false,'verify'=> true]);
Route::get('/login',Login::class)->name('login');
Route::get('/register',Register::class)->name('register');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ===============================ADMIN===============================
Route::middleware(['auth:admin'])->group(function () {

    // Profile
    Route::get('prof-admin',[ProfAdminController::class, 'index'])->name('prof-admin');
    Route::put('prof-admin-update',[ProfAdminController::class, 'update'])->name('prof-admin-update');

    // Dashboard
    Route::get('home',[HomeController::class,'index'])->name('home');

    // Akun Pengguna
    Route::get('akun',[AkunController::class,'index'])->name('akun');
    Route::get('lihat-akun/{id}',[AkunController::class,'show'])->name('lihat-akun');
    Route::delete('destroy-akun/{id}', [AkunController::class, 'destroy'])->name('destroy-akun');

    // Tambah Template
    Route::get('template',[TemplateController::class,'index'])->name('template');
    Route::get('tambah-template',[TemplateController::class,'create'])->name('tambah-template');
    Route::post('store-template', [TemplateController::class, 'store'])->name('store-template'); 
    Route::put('edit-template/{id}', [TemplateController::class, 'update'])->name('update-template');
    Route::delete('destroy-template/{id}', [TemplateController::class, 'destroy'])->name('destroy-template');

    // Audio
    Route::get('audio',[AudioController::class,'index'])->name('audio');
    Route::get('tambah-audio',[AudioController::class,'create'])->name('tambah-audio');
    Route::post('store-audio', [AudioController::class, 'store'])->name('store-audio'); 
    Route::get('edit-audio/{id}', [AudioController::class, 'edit'])->name('edit-audio');
    Route::put('edit-audio/{id}', [AudioController::class, 'update'])->name('update-audio');
    Route::delete('destroy-audio/{id}', [AudioController::class, 'destroy'])->name('destroy-audio');
  
    // Daftar Template
    Route::get('daftar-template',[DaftarTemplateController::class,'index'])->name('daftar-template');
    Route::get('view/{id}',[DaftarTemplateController::class,'view'])->name('view');
   
    // Setting (Tambah Kategori : audio dan template)
    Route::get('setting',[SettingController::class,'index'])->name('setting');
    Route::post('kategori-template',[SettingController::class,'storeTemplate'])->name('kategori-template');
    Route::delete('destroy-kategori-template/{id}',[SettingController::class,'destroyTemplate'])->name('destroy-kategori-template');
    Route::POST('kategori-audio',[SettingController::class,'storeAudio'])->name('kategori-audio');
    Route::delete('destroy-kategori-audio/{id}',[SettingController::class,'destroyAudio'])->name('destroy-kategori-audio');

    // Buat Undangan
    Route::get('sampel-undangan', [SampelController::class,'index'])->name('sampel-undangan');
    Route::get('pilih-undangan', [SampelController::class,'indexPilih'])->name('pilih-undangan');
    Route::get('create-undangan/{id}', [SampelController::class,'create'])->name('create-undangan');
    Route::post('admin-store-undangan', [SampelController::class,'store'])->name('admin-store-undangan');
    Route::get('admin-edit-undangan/{id}/{kategori_id}', [SampelController::class,'editForm'])->name('admin-edit-undangan');
    Route::put('admin-update-undangan-form/{id}/{kategori_id}', [SampelController::class, 'updateForm'])->name('admin-update-undangan-form');
    Route::get('admin-undangan-form/{id}/{kategori_id}', [SampelController::class, 'viewForm'])->name('admin-undangan-form');

});

// ===============================PREVIEW UNDANGAN===============================



// ===============================HALAMAN USER===============================

Route::middleware('auth')->group(function () {
    // Route untuk dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk profil
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route untuk pilih template
    Route::get('pilih-template', [PilihTemplateController::class, 'index'])->name('pilih-template');
     //BUAT UNDANGAN (kategori_tmp,kategori_audio, cover1-5,link_undangan)
    Route::get('buat-undagan/{id}',[PilihTemplateController::class,'create'])->name('buat-undagan');
    Route::post('store-undangan',[PilihTemplateController::class,'store'])->name('store-undangan');
    // Preview Undangan yang dibuat User
    Route::get('preview-undangan/{id}',[UndanganController::class, 'preview'])->name('preview-undangan');

 // Route untuk Undangan
    Route::get('undangan', [UndanganController::class, 'index'])->name('undangan');
    Route::get('edit-undangan/{id}',[UndanganController::class, 'edit'])->name('edit-undangan');
    Route::post('profil-wedding-update{buatUndanganId}', [UndanganController::class,'update'])->name('profil-wedding-update');
    Route::post('update-opening{buatUndanganId}', [UndanganController::class,'updateOpening'])->name('update-opening');
    Route::post('update-detail-acara{buatUndanganId}', [UndanganController::class,'updateDetailAcara'])->name('update-detail-acara');
    Route::post('update-galeri{buatUndanganId}', [UndanganController::class,'updateGalleri'])->name('update-galeri');
    Route::delete('destroy-undangan/{id}', [UndanganController::class, 'destroy'])->name('destroy-undangan');

});


