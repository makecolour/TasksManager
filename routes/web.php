<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:UPLOADER')->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::post('/books/{book}/versions', [VersionController::class, 'store'])->name('versions.store');
});

Route::prefix('admin')->middleware('role:ADMIN')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'list'])->name('users.index');
        Route::post('/{user}/roles', [UserController::class, 'assignRole'])->name('users.assignRole');
        Route::post('/roles', [UserController::class, 'assignRoles'])->name('users.roles');
    });
});

require __DIR__.'/auth.php';
