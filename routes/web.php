<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MassRegistrationController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MassStrukturController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/kegiatan', [PageController::class, 'kegiatan'])->name('kegiatan');
Route::get('/proker', [PageController::class, 'proker'])->name('proker');
Route::get('/materi', [PageController::class, 'materi'])->name('materi');
Route::get('/organisasi', [PageController::class, 'organisasi'])->name('organisasi');
Route::get('/berita', [PageController::class, 'berita'])->name('berita.index');
Route::get('/berita/{id}', [PageController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/materi/download/{materi}', [MateriController::class, 'download'])->name('materi.download');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('admin/mass-registration', [MassRegistrationController::class, 'showForm'])->name('admin.mass.register.form');
Route::post('admin/mass-registration', [MassRegistrationController::class, 'processForm'])->name('admin.mass.register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::get('/events/{event}/scan', [EventController::class, 'showScanner'])->name('events.scan');
    Route::post('/events/attendance', [EventController::class, 'processAttendance'])->name('events.attendance');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');
    Route::get('/home', [DashboardController::class, 'home'])->name('admin.home');
    Route::get('events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('events/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('news', NewsController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('proker', ProkerController::class);
    Route::resource('sponsor', SponsorController::class);
    Route::resource('halaman', HalamanController::class);
    Route::resource('materi', MateriController::class);
    Route::resource('users', UserController::class);
    Route::resource('profile', ProfileController::class);
    Route::put('profile', [ProfileController::class, 'update'])->name('password.update');




    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::prefix('bidang')->name('bidang.')->group(function () {
        Route::get('/', [BidangController::class, 'index'])->name('index');
        Route::get('/create', [BidangController::class, 'create'])->name('create');
        Route::post('/', [BidangController::class, 'store'])->name('store');
        Route::get('/{bidang}/edit', [BidangController::class, 'edit'])->name('edit');
        Route::put('/{bidang}', [BidangController::class, 'update'])->name('update');
        Route::delete('/{bidang}', [BidangController::class, 'destroy'])->name('destroy');
    });
    Route::get('import', [MassStrukturController::class, 'showForm'])->name('import.form');
    Route::post('import', [MassStrukturController::class, 'import'])->name('import');
});
