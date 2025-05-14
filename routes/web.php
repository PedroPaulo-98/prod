<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::get('/', [PagesController::class, 'home'])->name('page.home');
Route::get('/sobre', [PagesController::class, 'about'])->name('page.about');
Route::get('/boletim', [PagesController::class, 'bulletim'])->name('page.bulletim');
Route::get('/missoes', [PagesController::class, 'mission'])->name('page.mission');
Route::get('/ministerios', [PagesController::class, 'ministry'])->name('page.ministry');
Route::get('/contatos', [PagesController::class, 'contact'])->name('page.contact');

require __DIR__.'/auth.php';
