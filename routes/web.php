<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BazookaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get("/", [PageController::class, 'home']);
Route::get("/login", [AuthController::class, 'showLoginForm'])->name('login');
Route::post("/login", [AuthController::class, 'login']);
Route::post("/logout", [AuthController::class, 'logout'])->name('logout');

// Middleware group for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get("/home", [PageController::class, 'home'])->name('home');
    Route::get("/bazooka", [BazookaController::class, 'index'])->name('bazooka.index');
    Route::get("/bazooka/add-form", [BazookaController::class, 'createForm'])->name('bazooka.createForm');
    Route::post("/bazooka/save", [BazookaController::class, 'store'])->name('bazooka.save');
    Route::delete('/bazooka/delete/{id}', [BazookaController::class, 'destroy'])->name('bazooka.delete');
    Route::get('/bazooka/{id}/edit', [BazookaController::class, 'edit'])->name('bazooka.edit');
    Route::put('/bazooka/update/{id}', [BazookaController::class, 'update'])->name('bazooka.update');

    Route::get('/user/change-password', [UserController::class, 'showChangePasswordForm'])->name('password.change');
    Route::get('/user/edit-profile', [UserController::class, 'showEditProfileForm'])->name('profile.edit');
    Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('password.update');
});

