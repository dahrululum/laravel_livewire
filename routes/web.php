<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
})->name('home');

Route::get('/students', [StudentController::class,'index']);

Route::get('/counter', Counter::class);

Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');
