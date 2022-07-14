<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CodeOfConductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\NotificationsController;
use App\Http\Controllers\User\PostsController as UserPostsController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('event');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/blogs/{id}', [BlogsController::class, 'blogDetailView'])->name('blogs.show');
Route::get('/code-of-conduct/', [CodeOfConductController::class, 'index'])->name('code-of-conduct');

Auth::routes();

// User dashboard
Route::prefix('u')->middleware(['auth', 'auth.memberonly'])->name('user.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('user.notifications');
    })->name('dashboard');
    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

    // posts
    Route::get('/posts/pending', [UserPostsController::class, 'pendingPostView'])->name('posts.pending');
    Route::get('/posts/published', [UserPostsController::class, 'publishedPostView'])->name('posts.published');
    Route::resource('posts', UserPostsController::class);
});


// Todo: refactor this route to use resource
// admin
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('posts', PostsController::class);
    Route::post('/posts/{id}/{publish}', [PostsController::class, 'publish'])->name('posts.publish');
    Route::post('/posts/featured', [DashboardController::class, 'storeFeaturedPost'])->name('posts.featured');

    Route::get('/members', [MembersController::class, 'index'])->name('members');
    Route::get('/members/executive/add', [MembersController::class, 'addExecutive'])->name('members-executive-add');
    Route::post('/members/executive/add', [MembersController::class, 'storeExecutive']);
    Route::get('/members/executive/{id}/edit', [MembersController::class, 'editExecutiveView'])->name('members-executive-edit');
    Route::post('/members/executive/{id}/edit', [MembersController::class, 'updateExecutive']);
    Route::post('/members/executive/{id}/delete', [MembersController::class, 'deleteExecutive'])->name('members-executive-delete');

    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/user/add', [UsersController::class, 'addUser'])->name('users-add');
    Route::post('/user/add', [UsersController::class, 'store']);
    Route::get('/user/{id}/edit', [UsersController::class, 'editUserView'])->name('users-edit');
    Route::post('/user/{id}/edit', [UsersController::class, 'updateUser']);
    Route::post('/user/{id}/delete', [UsersController::class, 'deleteUser'])->name('users-delete');
});
