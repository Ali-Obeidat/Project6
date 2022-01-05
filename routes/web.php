<?php
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('index');
})->name('index');
// Route::get('/admin', function () {
//     return view('admin.index');
// })->name('index_admin')->middleware('auth');

// Route::get('/admin/{id}', function () {
//     return view('admin.index');
// })->name('show_exam')->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('home');
Route::get('/contactUs', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function(){
    // Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show_exam');
    Route::resource('/exams', 'App\Http\Controllers\ExamController');
    Route::resource('/questions', 'App\Http\Controllers\QuestionController');
    Route::resource('/results', 'App\Http\Controllers\ResultController');

});

Route::middleware('role:Admin')->group(function(){
   
    
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('index_admin');

});