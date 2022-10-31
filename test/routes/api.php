<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Models\User;


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

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
 

Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::group(['middleware' => ['role:admin']],function(){
        Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'index']);
        Route::get('/users/{id}', [\App\Http\Controllers\Api\UserController::class, 'show']);
        Route::put('/users/{id}', [\App\Http\Controllers\Api\UserController::class, 'update']);
        Route::delete('/users/{id}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);
        Route::post('/users', [\App\Http\Controllers\Api\UserController::class, 'store']);
    });

    Route::group(['middleware' => ['role:comum']],function(){ 
        Route::get('/courses', [\App\Http\Controllers\Api\ViewsController::class, 'indexCourses']);
        Route::get('/categories', [\App\Http\Controllers\Api\ViewsController::class, 'indexCategories']);
        Route::get('/files', [\App\Http\Controllers\Api\ViewsController::class, 'indexFiles']);
    });
    
    
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});



