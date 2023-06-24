<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserUploadController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\MyImagesController;

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

// for home
Route::get('/', [HomeController::class, 'index'])->name('home');
// for blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');


// for users
Route::group(['prefix' => 'user'],function(){
    Route::group(['middleware' => 'userAuth'],function(){
        // for images
        Route::get('/upload', [UserUploadController::class, 'upload'])->name('user.upload.show');
        Route::post('/upload-get', [UserUploadController::class, 'getUpload'])->name('user.upload');
        Route::get('/all-Images', [MyImagesController::class, 'allImages'])->name('user.all.Images');
        Route::get('/image/send-for-sale/{imageID}', [MyImagesController::class, 'sendForSale'])->name('user.Images.Sale');
        // for financial
        Route::get('/financial', [FinancialController::class, 'showFinancial'])->name('user.financial.show');
        Route::get('/financial/cashout', [FinancialController::class, 'cashout'])->name('user.financial.cashout');
    });
    Route::get('/', [HomeController::class, 'redirectUser'])->name('redirectUser');

    // register
    Route::get('/register', [UserAuthController::class, 'showRegister'])->name('user.register.show');
    Route::get('/getRegister', [UserAuthController::class, 'getRegister'])->name('user.getRegister');
    // login
    Route::get('/login', [UserAuthController::class, 'showLogin'])->name('user.login.show');
    Route::get('/login-get', [UserAuthController::class, 'login'])->name('user.login');
    // logout
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});



// for admin
Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'adminAuth'],function(){
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');
        // for images
        Route::get('/approval', [AdminHomeController::class, 'approveShow'])->name('admin.approval.show');
        Route::get('/approval/update-status/{imageID}/{status}', [AdminHomeController::class, 'imageApproveStatusUpdate'])->name('admin.approval.update');
        // for image buyOUt
        Route::get('/buy-out', [AdminHomeController::class, 'buyOutShow'])->name('admin.buyout.show');
        Route::post('/buy-out/update/', [AdminHomeController::class, 'buyOutUpdate'])->name('admin.buyout.update');
        // for image CashOUt
        Route::get('/cashout', [AdminHomeController::class, 'showCashouts'])->name('admin.cashout.show');
        Route::get('/cashout/update/{cashoutID}/{status}', [AdminHomeController::class, 'cashoutUpdate'])->name('admin.cashout.update');
    });
   

    // for register
    Route::get('/register', [AdminAuthController::class, 'adminShowRegister'])->name('admin.register.show');
    Route::get('getregister', [AdminAuthController::class, 'getRegister'])->name('admin.getRegister');
    // for login
    Route::get('/login', [AdminAuthController::class, 'adminShowLogin'])->name('admin.login.show');
    Route::get('/login-get', [AdminAuthController::class, 'adminlogin'])->name('admin.login');
    // for logout
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});