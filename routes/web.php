<?php

use App\Http\Controllers\BenchMarkScoreController;
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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ChoiceTestController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JudgesHasUserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuickResponseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePlayController;
use App\Http\Controllers\UserController;
use App\Models\JudgesHasUser;
use App\Models\RolePlay;
use Illuminate\Support\Benchmark;

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/update/{slug}', [UserController::class, 'update'])->name('user.update');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
    });
    Route::prefix('master-company')->group(function () {
        Route::get('/index', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/edit/{slug}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/update/{slug}', [CompanyController::class, 'update'])->name('company.update');
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
    });

    Route::prefix('master-item')->group(function () {
        Route::get('/index',            [ItemController::class, 'index'])->name('item.index');
        Route::get('/create',           [ItemController::class, 'create'])->name('item.create');
        Route::get('/edit/{slug}',      [ItemController::class, 'edit'])->name('item.edit');
        Route::post('/store',           [ItemController::class, 'store'])->name('item.store');
        Route::post('/update/{slug}',   [ItemController::class, 'update'])->name('item.update');
        Route::get('/show',             [ItemController::class, 'show'])->name('item.show');
    });

    Route::prefix('role')->group(function () {
        Route::get('/index',            [RoleController::class, 'index'])->name('role.index');
        Route::get('/create',           [RoleController::class, 'create'])->name('role.create');
        Route::get('/edit/{slug}',      [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/store',           [RoleController::class, 'store'])->name('role.store');
        Route::post('/update/{slug}',   [RoleController::class, 'update'])->name('role.update');
        Route::get('/show',             [RoleController::class, 'show'])->name('role.show');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/index',            [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/create',           [PermissionController::class, 'create'])->name('permission.create');
        Route::get('/edit/{slug}',      [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/store',           [PermissionController::class, 'store'])->name('permission.store');
        Route::post('/update/{slug}',   [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/show',             [PermissionController::class, 'show'])->name('permission.show');
    });
});
