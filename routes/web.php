<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactUSController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});
Route::get('contact', [AdminController::class, 'contact'])->name('contact');
//Route::get('/test-mail', [ContactUsController::class, 'testMail']);
//Route::get('contact', [ContactUSController::class, 'contactUS'])->name('contactus');
Route::post('contact', [ContactUSController::class, 'contactUSPost'])->name('contactus.store');

//Route::get('index', [AdminController::class, 'index'])->name('index');

Route::get('aboutus', [AdminController::class, 'aboutus'])->name('aboutus');
Route::get('special', [AdminController::class, 'special'])->name('special');
Route::get('drink', [AdminController::class, 'drink'])->name('drink');



Auth::routes(['verify'=>true]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('users', [UserController::class, 'index'])->name('users');
