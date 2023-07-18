<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(AuthController::class)->group(function () {

    Route::post('/auth/register', 'createUser');
    Route::post('/auth/login',  'loginUser')->name('login');

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('task')->controller(TaskController::class)->group(function () {

    Route::get('/', 'index');
    Route::get('/tag-list', 'getTags');
    Route::get('/status-list', 'getStatuses');
    Route::post('/store', 'store');

    Route::post('/edit-status/{id}', 'update');
    Route::post('/edit-task/{id}', 'update');
    Route::get('/detail/{id}', 'show');
    Route::post('/delete/{id}', 'destroy');
});
