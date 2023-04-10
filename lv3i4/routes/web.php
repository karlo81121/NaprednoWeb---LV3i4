<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [ProjectController::class, 'index'], function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/addproject', [ProjectController::class, 'store']);

Route::get('/project-update/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::post('/project-update', [ProjectController::class, 'update'])->name('project.update');

Route::get('/project-update/clan/{id}', [ProjectController::class, 'editbymember'])->name('clan.edit');
Route::post('/project-update/clan', [ProjectController::class, 'updatebymember'])->name('clan.update');