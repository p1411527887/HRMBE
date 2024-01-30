<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\UserAttributeController;
use App\Http\Controllers\Api\UserIssueController;
use Illuminate\Support\Facades\Route;
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

//Route::post('/post-login', [ApiUserController::class, 'postLogin'])->name('postLogin');

//    auth:api
//    jwt.auth
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh.token');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/user-profile', [AuthController::class, 'userProfile'])->name('auth.user.profile');

    Route::resource('/levels', LevelController::class) ->names([
        'index' => 'levels.list',
        'store' => 'levels.create',
        'update' => 'levels.update',
    ]);

    Route::get('cwd-user', [UserController::class, 'index'])->name('cms.list_cwd_user');
    Route::get('cwd-user-issue/view', [UserIssueController::class, 'view'])->name('cms.list_personal_issue');
    Route::get('cwd-user-issue/show/{id}', [UserIssueController::class, 'show'])->name('cms.list_personal_issue');

    Route::post('cwd-user-attribute/update/{id}', [UserAttributeController::class, 'update'])->name('cms.update_cwd_user_attribute');
});


