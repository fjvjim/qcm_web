<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\admin\ReponseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QcmController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index']);
///Route::get('questionnair', [QcmController::class, 'index'])->middleware('auth');
Route::get('/questionnair', [QcmController::class, 'index']);
Route::get('question/liste/{id}', [QcmController::class, 'liste']);
Route::post('question/valide',[QcmController::class, 'store']);
Route::get('question/resultats',[QcmController::class, 'resultat']);

Route::post('login', [AuthController::class, 'userLogin']);
Route::get('/logout', function () {
    if(session()->has('user')){
        session()->pull('user');
    }
    return redirect('/');
});

Route::post('loginadmin', [AuthController::class, 'adminLogin']);
Route::get('/logoutadmin', function () {
    if(session()->has('admin')){
        session()->pull('admin');
    }
    return redirect('/admin');
});

Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/question', [QuestionController::class, 'index']);
Route::get('admin/question/add/{id}', [QuestionController::class, 'edit']);
Route::post('admin/question/save', [QuestionController::class, 'store']);
Route::get('admin/question/delete/{id}', [QuestionController::class, 'drop']);

Route::get('admin/reponse/add/{question_id}/{id}', [ReponseController::class, 'edit']);
Route::post('admin/reponse/save', [ReponseController::class, 'store']);
Route::get('admin/reponse/delete/{question_id}/{id}', [ReponseController::class, 'drop']);
Route::get('admin/reponse/liste/{id}', [ReponseController::class, 'index']);

