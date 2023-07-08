<?php

use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'getData'])->name('movie');
Route::get('details', [MovieController::class, 'getDetails'])->name('details');
Route::get('genre', [MovieController::class, 'getGenre'])->name('genre');
Route::get('tvlist', [MovieController::class, 'getTvlist'])->name('tvlist');
Route::get('/genre/{genreId}/movies', [MovieController::class, 'getMovieGenre'])->name('genre.movies');
Route::get('/genre/{tvlistId}/tvlist', [MovieController::class, 'getDetailTvlist'])->name('genre.tvlist');