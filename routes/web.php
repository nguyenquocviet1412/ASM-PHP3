<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::get('/category/{id}', [PostController::class,'list'])->name('posts.category');
Route::get('/detail/{id}', [PostController::class,'detail'])->name('posts.detail');

Route::get('/posts/search',[PostController::class,'search'])->name('posts.search');




//Admin


Route::middleware([Authenticate::class,CheckAuth::class])->group(function(){
    Route::prefix('admin')->group(function(){
    //Trang chủ ADMIN
        Route::get('/',[AdminController::class,'index'])->name('admin.index');

    //CRUD POST
        Route::get('/posts',[AdminPostController::class,'indexPost'])->name('admin.posts.index');

        Route::get('/posts/show/{post}',[AdminPostController::class,'showPost'])->name('admin.posts.show');

        Route::post('/posts/toggle-status/{post}', [AdminPostController::class, 'toggleStatus'])->name('admin.toggleStatus');

        Route::get('/posts/create',[AdminPostController::class,'createPost'])->name('admin.posts.create');
        Route::post('/posts/create',[AdminPostController::class,'storePost'])->name('admin.posts.store');

        Route::get('/posts/edit/{post}',[AdminPostController::class,'editPost'])->name('admin.posts.edit');
        Route::put('/posts/edit/{post}',[AdminPostController::class,'updatePost'])->name('admin.posts.update');

        Route::delete('/posts/delete/{post}',[AdminPostController::class,'destroyPost'])->name('admin.posts.destroy');

    //CRUD CATEGORY
        Route::get('/categories',[CategoryController::class,'indexCategory'])->name('admin.categories.index');

        Route::get('/categories/show/{category}',[CategoryController::class,'showCategory'])->name('admin.categories.show');

        Route::get('/categories/create',[CategoryController::class,'createCategory'])->name('admin.categories.create');
        Route::post('/categories/create',[CategoryController::class,'storeCategory'])->name('admin.categories.store');

        Route::get('/categories/edit/{category}',[CategoryController::class,'editCategory'])->name('admin.categories.edit');
        Route::put('/categories/edit/{category}',[CategoryController::class,'updateCategory'])->name('admin.categories.update');

        Route::delete('/categories/delete/{category}',[CategoryController::class,'destroyCategory'])->name('admin.categories.destroy');

    //CRUD USER
        Route::get('/users',[UserController::class,'indexUser'])->name('admin.users.index');

        Route::get('/users/show/{user}',[UserController::class,'showUser'])->name('admin.users.show');

        Route::post('/admin/toggle-statusUser/{user}', [UserController::class, 'toggleStatusUser'])->name('admin.toggleStatusUser');

        Route::get('/users/create',[UserController::class,'createUser'])->name('admin.users.create');
        Route::post('/users/create',[UserController::class,'storeUser'])->name('admin.users.store');

        Route::get('/users/edit/{user}',[UserController::class,'editUser'])->name('admin.users.edit');
        Route::put('/users/edit/{user}',[UserController::class,'updateUser'])->name('admin.users.update');

        Route::delete('/users/delete/{user}',[UserController::class,'destroyUser'])->name('admin.users.destroy');

    });
});



//Login, register, logout

Route::get('/login', [AuthController::class,'getLogin'])->name('login');
Route::post('/login', [AuthController::class,'postLogin'])->name('postLogin');

Route::get('/register', [AuthController::class,'getRegister'])->name('register');
Route::post('/register', [AuthController::class,'postRegister'])->name('postRegister');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');
