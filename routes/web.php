<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {

    if (auth()->check()) {
        return redirect()->route('admin.index');
    }

    return redirect()->route('login');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    });

    // หน้า Index ของ Admin
    Route::get('/', [AdminController::class, 'index'])->name('index');


    // หน้า Index ของ User
    Route::prefix('user')->name('user.')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('add', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');

        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');

        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('destroy');

        Route::get('timelog', [UserController::class, 'timelog'])->name('timelog');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
