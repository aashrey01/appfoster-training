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


Route::delete('/users/{userId}/projects/{projectId}', [UserController::class, 'deleteProject'])->name('users.projects.delete');



Route::get('/users/{userId}/projects/{projectId}/edit', [UserController::class, 'editProject'])->name('users.projects.edit');
Route::put('/users/{userId}/projects/{projectId}', [UserController::class, 'updateProject'])->name('users.projects.update');


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