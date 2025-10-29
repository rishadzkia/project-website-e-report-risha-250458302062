<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/table', function () {
    return view('table');
});
Route::get('/index', function () {
    $nama = 'Risha';
    $jurusan = 'TRPL';
    $asal = 'Bekasi';
    return view('index', compact('nama', 'jurusan', 'asal')); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'iniAdmin'])->group(callback: function(): void{
    
});

// Route per-Controller 
Route::controller(FrontController::class)->group(callback: function(): void{
    Route::get('/dashboard', 'indexFront')->name('dashboard.admin');
} );
Route::controller(CategoryController::class)->group(callback: function(): void{
    Route::get('/category', 'indexCategory')->name('index.category');
    Route::post('/create-category', 'createCategory')->name('create.category');
    Route::put('/update-category', 'updateCategory')->name('update.category');
    Route::delete('/delete-category', 'deleteCategory')->name('delete.category');
} );
Route::controller(UserController::class)->group(callback: function(): void{
    Route::get('/user', 'indexUser')->name('user.admin');
    Route::post('/user-create', 'createUser')->name('user.create');
} );



