<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoletosController;
use Illuminate\Support\Facades\Mail;
use App\Mail\MeuEmail;

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

Route::middleware(['auth', 'verified'])->group( function() {

    Route::post("uploadFileClients", [BoletosController::class, 'index'])->name('upload');
    Route::get("/triggerEmail", [BoletosController::class, 'triggerEmail'])->name('triggerEmail');

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get("/home", function() {
        return view('home');
    })->name('dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
