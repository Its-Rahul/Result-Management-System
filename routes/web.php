<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ClassController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\ResultController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//for ajax
Route::post('class/getSubjectByClassId', [ClassController::class,'getSubjectByClassId'])->name('class.getSubject');
Route::post('class/getStudentByClassId', [ClassController::class,'getStudentByClassId'])->name('class.getStudent');

Route::get('class/create', [ClassController::class,'create'])->name('class.create');
Route::post('class', [ClassController::class,'store'])->name('class.store');
Route::get('class', [ClassController::class,'index'])->name('class.index');
Route::get('class/{id}', [ClassController::class,'show'])->name('class.show');
Route::delete('class/{id}', [ClassController::class,'destroy'])->name('class.destroy');
Route::get('class/{id}/edit', [ClassController::class,'edit'])->name('class.edit');
Route::put('class/{id}', [ClassController::class,'update'])->name('class.update');


Route::get('subject/create', [SubjectController::class,'create'])->name('subject.create');
Route::post('subject', [SubjectController::class,'store'])->name('subject.store');
Route::get('subject', [SubjectController::class,'index'])->name('subject.index');
Route::get('subject/{id}', [SubjectController::class,'show'])->name('subject.show');
Route::delete('subject/{id}', [SubjectController::class,'destroy'])->name('subject.destroy');
Route::get('subject/{id}/edit', [SubjectController::class,'edit'])->name('subject.edit');
Route::put('subject/{id}', [SubjectController::class,'update'])->name('subject.update');

Route::get('student/create', [StudentController::class,'create'])->name('student.create');
Route::post('student', [StudentController::class,'store'])->name('student.store');
Route::get('student', [StudentController::class,'index'])->name('student.index');
Route::get('student/{id}', [StudentController::class,'show'])->name('student.show');
Route::delete('student/{id}', [StudentController::class,'destroy'])->name('student.destroy');
Route::get('student/{id}/edit', [StudentController::class,'edit'])->name('student.edit');
Route::put('student/{id}', [StudentController::class,'update'])->name('student.update');
Route::get('student/create-pdf', [StudentController::class,'createPDF'])->name('student.createPDF');

Route::post('result/search', [ResultController::class,'search'])->name('result.search');
Route::get('result/create', [ResultController::class,'create'])->name('result.create');
Route::post('result', [ResultController::class,'store'])->name('result.store');
Route::get('result', [ResultController::class,'index'])->name('result.index');
Route::get('result/{id}', [ResultController::class,'show'])->name('result.show');
Route::delete('result/{id}', [ResultController::class,'destroy'])->name('result.destroy');
Route::get('result/{id}/edit', [ResultController::class,'edit'])->name('result.edit');
Route::put('result/{id}', [ResultController::class,'update'])->name('result.update');


Route::get('notice/create', [NoticeController::class,'create'])->name('notice.create');
Route::post('notice', [NoticeController::class,'store'])->name('notice.store');
Route::get('notice', [NoticeController::class,'index'])->name('notice.index');
Route::get('notice/{id}', [NoticeController::class,'show'])->name('notice.show');
Route::delete('notice/{id}', [NoticeController::class,'destroy'])->name('notice.destroy');
Route::get('notice/{id}/edit', [NoticeController::class,'edit'])->name('notice.edit');
Route::put('notice/{id}', [NoticeController::class,'update'])->name('notice.update');


Route::get('user/create', [UserController::class,'create'])->name('user.create');
Route::post('user', [UserController::class,'store'])->name('user.store');
Route::get('user', [UserController::class,'index'])->name('user.index');
Route::get('user/{id}', [UserController::class,'show'])->name('user.show');
Route::delete('user/{id}', [UserController::class,'destroy'])->name('user.destroy');
Route::get('user/{id}/edit', [UserController::class,'edit'])->name('user.edit');
Route::put('user/{id}', [UserController::class,'update'])->name('user.update');

