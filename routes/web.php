<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\FaqController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\TestController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\QuestionUserController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ResultController;

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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/faq', [FaqController::class,'index'])->name('faq');
Route::get('/contact', [ContactController::class,'index'])->name('contact');

Route::get('/test-user', [TestController::class,'test'])->name('test-user');
Route::get('/participant', [TestController::class,'participant'])->name('test-user.participant');
Route::post('/participant', [TestController::class,'store_participant'])->name('test-user.participant.store');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'authenticate'])->name('login.authenticate');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function(){

    Route::group(['middleware' => 'can:admin'], function (){
        Route::get('/dashboard-admin', [DashboardController::class,'index'])->name('dashboard.admin');
    
        Route::resource('faq-admin','App\Http\Controllers\Admin\FaqController');
        Route::resource('instruction-admin','App\Http\Controllers\Admin\InstructionController');
        Route::resource('card-admin','App\Http\Controllers\Admin\CardController');
        Route::resource('about-admin','App\Http\Controllers\Admin\AboutController');
        Route::resource('header-admin','App\Http\Controllers\Admin\HeaderController');
        Route::resource('user-admin','App\Http\Controllers\Admin\UserController');
        Route::resource('question-admin','App\Http\Controllers\Admin\QuestionController');
 
        Route::resource('result-admin','App\Http\Controllers\Admin\ResultController');
    });

    Route::group(['middleware' => 'can:user'], function (){
        Route::get('/before-user', [QuestionUserController::class,'before'])->name('test-user.before');
        Route::get('/question', [QuestionUserController::class,'question'])->name('test-user.question');
        Route::post('/submit-response', [QuestionUserController::class, 'submitResponses'])->name('user.submit-responses');
        Route::post('/user/save-response', [QuestionUserController::class, 'saveResponse'])->name('user.save-response');
        Route::get('/user/selesai', [QuestionUserController::class, 'selesai'])->name('user.selesai');


    });

 
    
});



