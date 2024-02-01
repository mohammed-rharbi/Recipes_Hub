<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('note',RecipesController::class)->middleware(['auth']);



Route::get('/dashboard', function () {
    return view('resp.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [RecipesController::class, 'show_home'])->name('home');

Route::get('/search', [RecipesController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/notes/{id}', [RecipesController::class, 'display'])->name('note.recipePage');


require __DIR__.'/auth.php';
