<?php
use App\Http\Controllers\PdfsController; 
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EnrollmentsController;
use App\Models\Course;
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

Route::get('/', [PageController::class,'index']);
Route::resource('/course',CoursesController::class);
Route::resource('/pdf',PdfsController::class);
Route::resource('/profile',ProfileController::class);
Route::resource('/enrollments',EnrollmentsController::class);
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pdf/{id}', 'PdfsController@show')->name('pdf.show');
