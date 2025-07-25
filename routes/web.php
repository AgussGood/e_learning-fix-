<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserQuizController;
use App\Http\Controllers\UserTugasController;
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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('user{id}', [App\Http\Controllers\FrontController::class, 'profil'])->name('profil');

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/kelas', [KelasController::class, 'list'])->name('kelas.list');
    Route::post('/kelas/{kelas}/join', [KelasController::class, 'join'])->name('kelas.join');
});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/tugas', [UserTugasController::class, 'index'])->name('tugas.index');
    Route::get('/tugas/{id}/kerjakan', [UserTugasController::class, 'kerjakan'])->name('tugas.kerjakan');
    Route::post('/tugas/{id}/submit', [UserTugasController::class, 'submit'])->name('tugas.submit');
    Route::get('/tugas/{id}/hasil', [UserTugasController::class, 'hasil'])->name('tugas.hasil');
    Route::get('/quiz', [UserQuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/{id}/kerjakan', [UserQuizController::class, 'kerjakan'])->name('quiz.kerjakan');
    Route::post('/quiz/{id}/submit', [UserQuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/{id}/hasil', [UserQuizController::class, 'hasil'])->name('quiz.hasil');
});

// Public

Route::resource('tahun_ajaran', TahunAjaranController::class)->middleware('auth');
Route::post('/tahun-ajaran/{id}/set-aktif', [TahunAjaranController::class, 'setAktif'])
    ->name('tahun_ajaran.setAktif');

Route::get('/materi/{id}/isi', [FrontController::class, 'isi'])->name('isi');

Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::get('/quizz', [FrontController::class, 'quizz'])->name('quizz');
Route::post('/quiz/{id}/quiz-submit', [FrontController::class, 'quizSubmit'])->name('quizSubmit');
Route::post('/quizz/periksa-kode', [FrontController::class, 'periksaKode'])->name('periksaKode');
Route::get('/quizz/{kode}/kerjakan', [FrontController::class, 'kerjakan'])->name('kerjakan');
Route::get('/tugass', [FrontController::class, 'tugass'])->name('tugass');

// Admin only
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('guru', GuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('kelas', KelasController::class);
    Route::get('guru/{id}/assign-kelas', [GuruController::class, 'showAssignKelasForm'])->name('guru.assignKelasForm');
    Route::post('guru/{id}/assign-kelas', [GuruController::class, 'assignKelas'])->name('guru.assignKelas');

});

// Guru and Admin
Route::prefix('guru')->middleware(['auth', 'role:guru'])->group(function () {
    Route::resource('quiz', QuizController::class);
    Route::resource('tugas', TugasController::class);
    Route::resource('materi', MateriController::class);
    Route::resource('rekap', RekapController::class);
});
