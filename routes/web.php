<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Filecontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
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

Route::view('/', 'welcome')->name('landing');



Route::get('notices', [HomePageController::class, 'notice'])->name('show.notice');
Route::get('Posts', [HomePageController::class, 'post'])->name('show.post');
Route::get('Help', [HomePageController::class, 'help'])->name('show.help');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth', 'verified'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // User Area
    Route::group(['prefix' => 'user'], function () {


        // SHOW USERS
        Route::group(['prefix' => 'show'], function () {

            Route::get('students', [UserController::class, 'showstudents'])->name('user.showstudents');
            Route::get('teacher', [UserController::class, 'showteachers'])->name('user.showteachers');
            Route::get('admins', [UserController::class, 'showadmins'])->name('user.showadmins');
            Route::get('superadmins', [UserController::class, 'showsuperadmins'])->name('user.showsuperadmins');
        });


        Route::get('chat', [ChatController::class, 'chat'])->name('chat.index');


        // SHOW LOGIN IN USER
        Route::get('profile', [UserController::class, 'showprofile'])->name('show.pofile');
        Route::get('edit', [UserController::class, 'editprofile'])->name('user.edit');
        Route::put('update', [UserController::class, 'updateprofile'])->name('user.update');

        Route::get('userprofile/{id}', [UserController::class, 'edituserprofile'])->name('user.admin.edit');
        Route::put('userupdate/{user}', [UserController::class, 'updateuserprofile'])->name('user.admin.update');


        // SEARCH USERS
        Route::group(['prefix' => 'search'], function () {
            Route::post('students', [UserController::class, 'searchstudents'])->name('user.search.students');
            Route::post('teachers', [UserController::class, 'searchteacher'])->name('user.search.teachers');
            Route::post('admins', [UserController::class, 'searchadmins'])->name('user.search.admins');
            Route::post('superadmins', [UserController::class, 'searchsuperadmins'])->name('user.search.superadmins');
        });

        //DELETE USERS
        Route::delete('{user}', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::group(['prefix' => 'settings'], function () {

        Route::get('show', [SettingsController::class, 'show'])->name('settings.show');


        // BRANCH 
        Route::group(['prefix' => 'branch'], function () {

            Route::post('create', [BranchController::class, 'store'])->name('branch.create');

            Route::put('update/{branch}', [BranchController::class, 'update'])->name('branch.update');
            Route::delete('{branch}', [BranchController::class, 'delete'])->name('branch.delete');
        });


        // DESIGNATION
        Route::group(['prefix' => 'designation'], function () {

            Route::post('create', [DesignationController::class, 'store'])->name('designation.create');
            Route::put('update/{designation}', [DesignationController::class, 'update'])->name('designation.update');
            Route::delete('{designation}', [DesignationController::class, 'delete'])->name('designation.delete');
        });


        // YEAR 
        Route::group(['prefix' => 'year'], function () {
            Route::post('create', [YearController::class, 'store'])->name('year.create');
            Route::put('update/{year}', [YearController::class, 'update'])->name('year.update');
            Route::delete('{year}', [YearController::class, 'delete'])->name('year.delete');
        });


        // ROLE
        Route::group(['prefix' => 'role'], function () {

            Route::post('create', [RoleController::class, 'store'])->name('role.create');
            Route::delete('{role}', [RoleController::class, 'delete'])->name('role.delete');
            Route::put('update/{role}', [RoleController::class, 'update'])->name('role.update');
        });
    });


    Route::group(['prefix' => 'notice'], function () {

        Route::get('index', [NoticeController::class, 'index'])->name('notice.index');
        Route::post('create', [NoticeController::class, 'store'])->name('notice.create');
        Route::put('update/{notice}', [NoticeController::class, 'update'])->name('notice.update');
        Route::delete('delete/{id}', [NoticeController::class, 'delete'])->name('notice.delete');

        Route::post('search', [NoticeController::class, 'search'], 'search')->name('notice.search');
    });

    Route::get('feed/{user}', [PostController::class, 'feed'])->name('posts.feed');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/post/show', [PostController::class, 'show'])->name('post.show');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{post}/edit', [ProfilesController::class, 'edit'])->name('post.edit');
    Route::put('/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('delete/{id}', [PostController::class, 'delete'])->name('post.delete');




    Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index'])->name('razorpayment.pay');
    Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
});
