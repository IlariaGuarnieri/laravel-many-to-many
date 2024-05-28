<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;

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

// rotta guest ROTTE PUBBLICHE
Route::get('/', [PageController::class, 'index'])->name('home');

//ROTTE ADMIN protette da middleware
Route::middleware(['auth', 'verified'])
  ->prefix('admin') //prefix lo vedro poi nell'url
  ->name('admin.') // . è tutte le pagine com prefisso admin
  ->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    // qui inseriamo tutte le rotte delle crud
    Route::resource('Project', ProjectController::class);
    Route::resource('Technology', TechnologyController::class);
    Route::resource('types', TypeController::class);

    // rotte custom

  });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ROTTE AUTH
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
