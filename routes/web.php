<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WakeUpController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/wakeup', [WakeUpController::class, 'get'])->name('wakeup.get');
Route::get('/wakeup/{id}', [WakeUpController::class, 'get'])->name('wakeup.get.id');
Route::post('/wakeup', [WakeUpController::class, 'post'])->name('wakeup.post');

Route::post('/comment/create', [CommentController::class, 'post'])->name('comment.create');

Route::get('/google', [GoogleController::class, 'index']);

Route::get('/demo/first', [DemoController::class, 'first'])->name('demo.first');
Route::get('/demo/second', [DemoController::class, 'second'])->name('demo.second');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
