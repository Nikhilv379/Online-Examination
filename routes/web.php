<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\userAccess;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentListController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;


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

Route::get('login' , function () {
    return view('login');
})->name('login')->middleware('preventAccessUntilLogout')->middleware('SetLocale');
Route::get('/check/login', [LoginController::class, 'login']);
Route::get('/change-language/{lang}', [LoginController::class, 'changeLanguage'])->name('changeLanguage')->middleware('SetLocale');

Route::middleware(['auth','restrictUser'])->group(function () {
    Route::get('/teacher/home', [HomeController::class, 'teacherHome'])->name('teacher.home');
});

Route::middleware(['auth','adminUser'])->group(function () {
    Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::view('index','index');
    Route::get('/add-quiz',[QuizController::class,'addQuiz'])->name('add.quiz');
    Route::get('/quiz-list',[QuizController::class,'index'])->name('list.quiz');
    Route::post('/store-quiz',[QuizController::class,'storeQuiz'])->name('store.quiz');
    Route::get('/quiz-list',[QuizController::class,'index'])->name('list.quiz');
    Route::get('/give-quiz/{id}',[QuizController::class,'joinQuiz'])->name('join.quiz');
    Route::post('/store-question',[QuestionController::class,'storeQuestion'])->name('store.question');
    Route::post('/store-answer',[AnswerController::class,'store'])->name('store.answer');
    Route::get('/add-question/{id}',[QuestionController::class,'addQuestion'])->name('add.question');
    Route::get('/results',[ResultController::class,'index'])->name('results');
    Route::get('home/quiz-list',[LoginController::class,'quiz-list']);
    Route::get('send',[UserController::class,"sendnotification"]);
    Route::get('/studentlist',[StudentListController::class,'index'])->name('student.list');
    Route::get('/studentdetail/{id}',[StudentListController::class,'details'])->name('student.detail');
    Route::get('/admin2',[LoginController::class,'adminDashboard']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('admin/users', UserController::class);
    Route::put('/users/{id}/update-password', 'UserController@updatePassword')->name('update.password');
    Route::get('/students/search', [StudentListController::class, 'index'])->name('search.student');
});
Route::get('/forget-password',[LoginController::class,'forgetPasswordLoad']);
Route::post('/forget-password',[LoginController::class,'forgetPassword'])->name('forgetPassword');
Route::get('/reset-password',[LoginController::class,'resetPasswordLoad']);
Route::post('/reset-password',[LoginController::class,'resetPassword'])->name('resetPassword');

