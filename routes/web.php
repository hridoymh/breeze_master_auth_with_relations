<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Route::get('/dashboard', [HomeController::class,'home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/post', [HomeController::class,'post'])->middleware(['auth', 'verified','admin']);

Route::middleware(['auth', 'verified', 'admin'])->group(function(){
    Route::get('admin/posts',[PostController::class,'adminlist']);
    Route::get('admin/trash/{id}',[PostController::class, 'trash']);
    Route::get('admin/delete/{id}',[PostController::class, 'pdelete']);
    Route::get('admin/aprove/{id}',[PostController::class, 'aprove']);
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('createpost',[PostController::class,'index']);
    Route::post('postcreate',[PostController::class,'store']);
    Route::get('posts',[PostController::class,'postlist']);
    Route::get('postswithcat/',[PostController::class,'postlistwithcat']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
