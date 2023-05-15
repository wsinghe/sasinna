<?php

use App\Http\Controllers\ProfileController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id?}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id?}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{id?}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['middleware' => ['can:view users']], function () {
        Route::get('/users', [ProfileController::class, 'index'])->name('users'); // Please ignore this. THis is additional route
        Route::view('/livewire-users','livewire.default')->name('livewire.users'); // This is for the live wire implementation
    });
});

require __DIR__.'/auth.php';
