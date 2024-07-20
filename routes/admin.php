<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactUSController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CategoryController;


/*
Route::middleware([ 'guest','web','verified'])->group(function () { // this is for undefined variable $errors handling
	// your package routes

    //user Routes
    Route::get('users', [UserController::class, 'index'])->name('usersList');
    Route::post('insertUser', [UserController::class, 'store'])->name('insertUser');
    Route::get('adduser', [UserController::class, 'create'])->name('addUser');
    Route::get('edituser/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::put('updateuser/{id}', [UserController::class, 'update'])->name('updateuser');

    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('register', [UserController::class, 'register'])->name('register');
    //Route::post('register', [RegisterController::class, 'register'])->name('register');

    

    

    

});*/



Route::middleware(['guest', 'web'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('loginPost', [LoginController::class, 'login'])->name('loginPost');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('registerPost', [RegisterController::class, 'register'])->name('registerPost');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'web', 'verified'])->group(function () {
    //user
    Route::get('users', [UserController::class, 'index'])->name('usersList');
    Route::post('insertUser', [UserController::class, 'store'])->name('insertUser');
    Route::get('adduser', [UserController::class, 'create'])->name('addUser');
    Route::get('edituser/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::put('updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
    
    //category
    Route::get('categories', [CategoryController::class, 'index'])->name('categoriesList');
    Route::post('insertCategory', [CategoryController::class, 'store'])->name('insertCategory');
    Route::get('addCategory', [CategoryController::class, 'create'])->name('addCategory');
    Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
    Route::put('updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('deleteCategory');

    //beverages
    Route::get('beverages', [BeverageController::class, 'index'])->name('beveragesList');
    Route::post('insertBeverage', [BeverageController::class, 'store'])->name('insertBeverage');
    Route::get('addBeverage', [BeverageController::class, 'create'])->name('addBeverage');
    Route::get('editBeverage/{id}', [BeverageController::class, 'edit'])->name('editBeverage');
    Route::put('updateBeverage/{id}', [BeverageController::class, 'update'])->name('updateBeverage');
    Route::delete('beverages/{id}', [BeverageController::class, 'destroy'])->name('deleteBeverage');

    //messages
    Route::get('messages', [ContactUSController::class, 'index'])->name('messages');
    Route::get('showMessage/{id}', [ContactUSController::class, 'show'])->name('showMessage');
    Route::delete('messages/{id}', [ContactUSController::class, 'destroy'])->name('deleteMessage');

    
    
});
