<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Frontend\HomeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth:admin', 'verified'])->group(function () {

    //Admin Profile
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

    //Admin Password
    Route::get('/admin-password', [AdminProfileController::class, 'AdminPasswordPage'])->name('admin.password.page');
    Route::post('/admin/password/update/submit', [AdminProfileController::class, 'AdminPasswordUpdateSubmit'])->name('admin.password.update.submit');

    // //All User
    // Route::get('/all-user', [AdminProfileController::class, 'AllUser'])->name('all.user');
    // Route::get('/delete-user/{id}', [AdminProfileController::class, 'DeleteUser'])->name('delete.user');

    // //Active Or Inactive
    // Route::get('/admin/user-inactive/{id}', [AdminProfileController::class, 'InactiveUserAdmin'])->name('user.inactive.admin');
    // Route::get('/admin/user-active/{id}', [AdminProfileController::class, 'ActiveUserAdmin'])->name('user.active.admin');
});



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('homepage');
/// Product Search Route
//Route::post('/search', [HomeController::class, 'courseSearch'])->name('course.search');

// Advance Search Routes
// Route::post('global-search', [HomeController::class, 'globalSearch'])->name('global.search');

require __DIR__ . '/frontend.php';
require __DIR__ . '/api.php';