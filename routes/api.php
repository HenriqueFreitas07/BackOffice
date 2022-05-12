<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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
Route::post('verifyToken', [Api\AuthController::class, 'verifyToken']);

Route::post('login', [Api\AuthController::class, 'login']);
Route::post('login/app', [Api\UserController::class, 'login']);

Route::post('register', [Api\RegisterController::class, 'register']);
Route::post('register/app', [Api\UserController::class, 'register']);

Route::post('forgot', [Api\ForgotController::class, 'forgot']);
Route::post('reset', [Api\ForgotController::class, 'reset']);
Route::get('email/resend/{user}', [Api\VerifyController::class, 'resend'])->name('verification.resend');
Route::get('email/verify/{id}', [Api\VerifyController::class, 'verify'])->name('verification.verify');; // Make sure to keep this as your route name
    
//App
Route::get('/news/{id}', [Api\NewsController::class, 'show']);
Route::post('/news/update/{id}', [Api\NewsController::class, 'update']);

Route::get('/timeline/{id}', [Api\TimelineController::class, 'show']);
Route::post('/timeline/update/{id}', [Api\TimelineController::class, 'update']);
Route::post('/timeline/delete/{id}', [Api\TimelineController::class, 'delete']);

Route::get('/projects/{id}', [Api\ProjectsController::class,'show']);
Route::post('/projects/update/{id}', [Api\ProjectsController::class,'update']);
Route::post('/projects/delete/{id}', [Api\ProjectsController::class,'delete']);


Route::group(['middleware' => ['auth:api']], function () {
    Route::get('user', [Api\AuthController::class, 'user']);
});
