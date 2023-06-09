<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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
    return view('home')->with('activities', Activity::all());
});

Route::get('/dashboard', function () {
    return view('dashboard')->with('activities', Activity::all());
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/{userProfiles}', [ProfileController::class, 'resettingPasswords'])->name('profile.resettingPasswords');
    Route::patch('/profile/{userProfile}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('users', UserController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names('users');


    Route::post('/resettingPasswords/{userProfiles}', [UserController::class, 'resettingPasswords'])->name('users.resettingPasswords');
    Route::get('/trashed-users', [UserController::class, 'trashed'])->name('users.trashed');
    Route::get('/restore-users/{id}', [UserController::class, 'restore'])->name('users.restore');

    Route::get('/force-delete-users', [UserController::class, 'deleteAll'])->name('users.deleteAll');
    Route::get('/force-delete-users/{id}', [UserController::class, 'deleting'])->name('users.deleting');

    Route::get('/trashed-activities', [ActivityController::class, 'trashed'])->name('activities.trashed');
    Route::get('/restore-activities/{id}', [ActivityController::class, 'restore'])->name('activities.restore');

    Route::get('/force-delete-activities', [ActivityController::class, 'deleteAll'])->name('activities.deleteAll');
    Route::get('/force-delete-activities/{id}', [ActivityController::class, 'deleting'])->name('activities.deleting');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('activities', ActivityController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names('activities');
    Route::get('activities/{activity}/delete-media/{id}', [ActivityController::class, 'deleteMedia'])->name('activities.deleteMedia');
});


Route::middleware('auth')->group(function () {
    Route::resource('activities-list', TeacherController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy', 'show'])
        ->names('activities-list');
    Route::post('activities-list/inscription', [TeacherController::class, 'createInscription'])->name('activities-list.createInscription');
    Route::post('activities-list/confirm-attendance', [TeacherController::class, 'confirmAttendance'])->name('activities-list.confirmAttendance');

    Route::get('/activities-list-teacher', [TeacherController::class, 'activitiesListTeacher'])->name('activities-list-teacher.activitiesInsription');
    Route::get('activities-list-teacher/{activity}', [TeacherController::class, 'confirmAttendanceShow'])->name('activities-list-confirmAttendance.confirmAttendance');
    Route::get('/user-profile/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/filters-activities-list', [ActivityController::class, 'listActivity'])->name('activities.listActivity');
    Route::get('/filters-activities-list-teacher', [ActivityController::class, 'listTeacher'])->name('activities.listTeacher');
    Route::get('/filters-list-teacher-activities', [ActivityController::class, 'listTeacherActivity'])->name('activities.listTeacherActivity');
});

Route::get('generate-pdf', [PDFController::class, 'generatePDFDateBody'])->name('generatePDFDateBody');
Route::get('generatePDFTeacher', [PDFController::class, 'generatePDFTeacher'])->name('generatePDFTeacher');
Route::get('generatePDFActivity', [PDFController::class, 'generatePDFActivity'])->name('generatePDFActivity');

require __DIR__ . '/auth.php';
