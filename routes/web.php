<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
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


// home
Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/event', [EventController::class, 'index'])-> name('event');
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');

Auth::routes(['register' => false]);

// admin
Route::get('/admin/', [DashboardController::class, 'index'])->name('admin-dashboard');

Route::get('/admin/posts', [PostsController::class, 'index'])->name('admin-posts');
Route::get('/admin/posts/add', [PostsController::class, 'addPost'])->name('admin-posts-add');
Route::post('/admin/posts/add', [PostsController::class, 'storePost']);

Route::get('/admin/members', [MembersController::class, 'index'])->name('admin-members');
Route::get('/admin/members/executive/add', [MembersController::class, 'addExecutive'])->name('admin-members-executive-add');
Route::post('/admin/members/executive/add', [MembersController::class, 'storeExecutive']);

Route::get('/admin/users', [UsersController::class, 'index'])->name('admin-users');
Route::get('/admin/user/add', [UsersController::class, 'addUser'])->name('admin-users-add');
Route::post('/admin/user/add', [UsersController::class, 'store']);
