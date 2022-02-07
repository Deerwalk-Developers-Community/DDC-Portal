<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BlogsController;
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
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::get('/blogs/{id}', [BlogsController::class, 'blogDetailView'])->name('blog-detail');

Auth::routes();

// User dashboard
Route::prefix('u')->middleware(['auth', 'auth.memberonly'])->name('user.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('user.notifications');
    });

    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');

    // posts
    Route::get('/posts/pending', [UserPostsController::class, 'pendingPostView'])->name('posts.pending');
    Route::get('/posts/published', [UserPostsController::class, 'publishedPostView'])->name('posts.published');

    Route::resource('posts', UserPostsController::class);
});


// Todo: refactor this route to use resource
// admin
Route::get('/admin/', [DashboardController::class, 'index'])->name('admin-dashboard');

Route::get('/admin/posts', [PostsController::class, 'index'])->name('admin-posts');
Route::get('/admin/posts/add', [PostsController::class, 'addPost'])->name('admin-posts-add');
Route::post('/admin/posts/add', [PostsController::class, 'storePost']);
Route::get('/admin/posts/{id}/edit', [PostsController::class, 'editPostView'])->name('admin-posts-edit');
Route::post('/admin/posts/{id}/edit', [PostsController::class, 'editPost']);
Route::post('/admin/posts/{id}/delete', [PostsController::class, 'deletePost'])->name('admin-posts-delete');
Route::post('/admin/posts/{id}/{publish}', [PostsController::class, 'publishPost'])->name('admin-posts-publish');

Route::get('/admin/members', [MembersController::class, 'index'])->name('admin-members');
Route::get('/admin/members/executive/add', [MembersController::class, 'addExecutive'])->name('admin-members-executive-add');
Route::post('/admin/members/executive/add', [MembersController::class, 'storeExecutive']);
Route::get('/admin/members/executive/{id}/edit', [MembersController::class, 'editExecutiveView'])->name('admin-members-executive-edit');
Route::post('/admin/members/executive/{id}/edit', [MembersController::class, 'updateExecutive']);
Route::post('/admin/members/executive/{id}/delete', [MembersController::class, 'deleteExecutive'])->name('admin-members-executive-delete');

Route::get('/admin/users', [UsersController::class, 'index'])->name('admin-users');
Route::get('/admin/user/add', [UsersController::class, 'addUser'])->name('admin-users-add');
Route::post('/admin/user/add', [UsersController::class, 'store']);
Route::get('/admin/user/{id}/edit', [UsersController::class, 'editUserView'])->name('admin-users-edit');
Route::post('/admin/user/{id}/edit', [UsersController::class, 'updateUser']);
Route::post('/admin/user/{id}/delete', [UsersController::class, 'deleteUser'])->name('admin-users-delete');
