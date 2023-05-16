<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/{userProfiles}', [ProfileController::class, 'resettingPasswords'])->name('profile.resettingPasswords');
    Route::patch('/profile/{userProfile}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/user-profile/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/trashed-users', [UserController::class, 'trashed'])->name('users.trashed');
Route::get('/restore-users/{id}', [UserController::class, 'restore'])->name('users.restore');

Route::get('/force-delete-users', [UserController::class, 'deleteAll'])->name('users.deleteAll');
Route::get('/force-delete-users/{id}', [UserController::class, 'deleting'])->name('users.deleting');

Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', UserController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names('users');
});

require __DIR__.'/auth.php';
