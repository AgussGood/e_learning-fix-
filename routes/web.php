<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserTugasController;
use App\Http\Controllers\RekapController;
use App\Http\Middleware\RoleMiddleware;

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

Route::get('/', [FrontController::class, 'index'])->name('welcome');

Route::get('materi{id}', [App\Http\Controllers\FrontController::class, 'isi'])->name('isi');
Route::resource('mapel', MapelController::class);
Route::resource('quiz', QuizController::class);
Route::resource('tugas', TugasController::class);
Route::resource('materi', MateriController::class);
Route::resource('kelas', KelasController::class);
Route::resource('rekap', RekapController::class);

Route::prefix('user')->middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/tugas', [UserTugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}/kerjakan', [UserTugasController::class, 'kerjakan'])->name('tugas.kerjakan');
    Route::post('/tugas/{id}/submit', [UserTugasController::class, 'submit'])->name('tugas.submit');
    Route::get('/tugas/{id}/hasil', [UserTugasController::class, 'hasil'])->name('tugas.hasil');
});


// Public
Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::get('/quizz', [FrontController::class, 'quizz'])->name('quizz');
Route::get('/tugass', [FrontController::class, 'tugass'])->name('tugass');

// Admin only
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('kelas', KelasController::class);
});

//Guru and Admin
Route::middleware(['auth', 'role:guru,admin'])->group(function () {
    Route::resource('quiz', QuizController::class);
    Route::resource('tugas', TugasController::class);
    Route::resource('materi', MateriController::class);
});

// Siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    // route khusus siswa bisa ditaruh di sini
});



Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
