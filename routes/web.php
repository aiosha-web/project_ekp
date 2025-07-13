<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserQuizController;
use App\Http\Controllers\ProgressController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/videos/create', [App\Http\Controllers\VideoController::class, 'create'])->name('video.create');
Route::post('/videos/store', [App\Http\Controllers\VideoController::class, 'store'])->name('video.store');
Route::get('/videos', [App\Http\Controllers\VideoController::class, 'index'])->name('video.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}/videos', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.videos');

Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->name('video.destroy');
// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/quiz/category/{video}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');
    Route::post('/quiz/{video}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/progress', [RegisterController::class, 'progress'])->name('user.progress')->middleware('auth');
});
Route::get('/quiz/take/{video}', [QuizController::class, 'show'])->name('quiz.take');
// لعرض صفحة إدخال أسئلة لكل فيديو داخل القسم
Route::get('/quiz/category/{category}', [QuizController::class, 'showCategory'])->name('quiz.show');
// لعرض اختبار فيديو معين
Route::get('/quiz/{video}', [QuizController::class, 'show'])->name('quiz.take');


Route::get('/quiz/create/{video}', [QuizController::class, 'create'])->name('quiz.create');
Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');

Route::get('/progress', [\App\Http\Controllers\UserVideoProgressController::class, 'index'])->name('user.progress')->middleware('auth');



