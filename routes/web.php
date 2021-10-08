<?php

use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AlbumsController::class, 'index']);
Route::get('/albums', [AlbumsController::class, 'index'])->name('album-index');
Route::get('/albums/create', [AlbumsController::class, 'create'])->name('album-create');
Route::post('/albums/store', [AlbumsController::class, 'store'])->name('album-store');
Route::get('/albums/{id}', [AlbumsController::class, 'show'])->name('album-show');

Route::get('/photos/create/{albumId}', [PhotosController::class, 'create'])->name('photo-create');
Route::post('/photos/store', [PhotosController::class, 'store'])->name('photo-store');
Route::delete('/photos/{id}', [PhotosController::class, 'destroy'])->name('photo-delete');
Route::get('/photos/{id}', [PhotosController::class, 'show'])->name('photo-show');
