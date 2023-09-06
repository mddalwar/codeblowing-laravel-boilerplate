<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Users\Add;
use App\Livewire\Users\Update;
use App\Livewire\Users\Users;
use App\Livewire\Dashboard;
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
})->name('home');

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->name('users.')->group(function(){
    Route::get('/users/add', Add::class)->name('add');
    Route::get('/users', Users::class)->name('index');
    Route::get('/users/update/{user}', Update::class)->name('update');
    Route::get('/users/delete', [UserController::class, 'delete'])->name('delete');
});


require __DIR__.'/auth.php';
