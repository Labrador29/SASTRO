<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MassRegistrationController;

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
Route::get('/organisasi', [PageController::class, 'organisasi'])->name('organisasi');

// Auth Routes
// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('admin/mass-registration', [MassRegistrationController::class, 'showForm'])->name('admin.mass.register.form');
Route::post('admin/mass-registration', [MassRegistrationController::class, 'processForm'])->name('admin.mass.register');

// Ganti route dashboard yang lama dengan yang baru
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class);
    Route::get('/events/{event}/scan', [EventController::class, 'showScanner'])->name('events.scan');
    Route::post('/events/attendance', [EventController::class, 'processAttendance'])->name('events.attendance');
});

// Tambahkan middleware untuk admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::resource('bidang', BidangController::class);
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
});
