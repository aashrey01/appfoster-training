<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/users', [UserController::class, 'index']);
// Route::get('/user/{userId}/projects', [ProjectController::class, 'index']);

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/users/{userId}/projects', [UserController::class, 'projects'])->name('users.projects.index');

Route::get('/users/{userId}/projects/create', [UserController::class, 'createProject'])->name('users.projects.create');
Route::post('/users/{userId}/projects', [UserController::class, 'storeProject'])->name('users.projects.store');

    
// Route::get('/users/{userId}/projects/back', [UserController::class, 'backToProjectsIndex'])->name('users.projects.back');

// Route::get('/users/{userId}/projects/1}', [UserController::class, 'showProject'])->name('users.projects.show');
// Route::get('/users/{userId}/projects/1/edit', [UserController::class, 'editProject'])->name('users.projects.edit');

// Route::get('/users/{userId}/projects/1', [UserController::class, 'destroyProject'])->name('users.projects.destroy');



/*
Route::get('/posts', function(){
    return response()->json([
        'posts'=>[
            [
                'title'=>'Post 1'
            ]
        ]
    ]);
});
*/