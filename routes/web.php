<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/* USES FOR BACKEND */
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BackendUserController;
use App\Http\Controllers\BackendPhotoController;
use App\Http\Controllers\BackendPresetController;
use App\Http\Controllers\BackendPurchaseController;
use App\Http\Controllers\BackendCommentController;
use App\Http\Controllers\BackendFavouriteController;
use App\Http\Controllers\BackendValuationController;
use App\Http\Controllers\BackendLikeController;

/* USES FOR FRONTEND */
use App\Http\Controllers\FrontendPhotoController;
use App\Http\Controllers\FrontendPresetController;
use App\Http\Controllers\FrontendLikeController;
use App\Http\Controllers\FrontendPurchaseController;
use App\Http\Controllers\FrontendFavouriteController;


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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexlogged'])->name('indexlogged')->middleware('auth');;
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

//PHOTOS
Route::get('/myphotos', [App\Http\Controllers\FrontendPhotoController::class, 'myphotos'])->name('myphotos');

Route::get('/myphotos/create', [FrontendPhotoController::class, 'create'])->name('photo.create');
Route::post('/myphotos/create', [FrontendPhotoController::class, 'store'])->name('photo.store');
Route::get('/home/photos/{id}', [FrontendPhotoController::class, 'showphoto'])->name('showphoto');
Route::post('/home/photos/like', [FrontendLikeController::class, 'store'])->name('like.create');
Route::get('delete/like/{idlike}/{id}/{iduser}', [FrontendLikeController::class, 'destroy']);
Route::post('/home/presets/favourite', [FrontendFavouriteController::class, 'store'])->name('favourite.create');
Route::get('delete/favourite/{idfavourite}/{id}/{iduser}', [FrontendFavouriteController::class, 'destroy']);

Route::get('/home/photos/{id}/edit', [FrontendPhotoController::class, 'edit'])->name('photo.edit');
Route::put('/home/photos/{id}/edit', [FrontendPhotoController::class, 'update'])->name('photo.update');
Route::post('comment/{id}', [FrontendPhotoController::class, 'createComment'])->name('createComment');

//PRESETS
Route::get('/mypresets', [App\Http\Controllers\FrontendPresetController::class, 'mypresets'])->name('mypresets');

Route::get('/mypresets/create', [FrontendPresetController::class, 'create'])->name('preset.create');
Route::post('/mypresets/create', [FrontendPresetController::class, 'store'])->name('preset.store');
Route::get('mypresets/preset/{preset}/editcreate', [FrontendPresetController::class, 'editCreate'])->name('frontend.preset.editcreate');
Route::put('mypresets/preset/updatecreate/{preset}', [FrontendPresetController::class, 'updateCreate'])->name('preset.preset');
Route::get('/home/presets/{id}', [FrontendPresetController::class, 'showpreset'])->name('showpreset');
Route::get('/home/presets/{id}/edit', [FrontendPresetController::class, 'edit'])->name('preset.edit');
Route::put('/home/presets/{id}/edit', [FrontendPresetController::class, 'update'])->name('preset.update');
Route::post('valuation/{id}', [FrontendPresetController::class, 'createValuation'])->name('createValuation');

//DEMASIÁO
Route::get('/mylikes', [FrontendLikeController::class, 'index'])->name('mylikes');
Route::get('/myfavourites', [FrontendFavouriteController::class, 'myfavourites'])->name('myfavourites');
Route::get('/myshopping', [FrontendPurchaseController::class, 'myshopping'])->name('myshopping');
Route::get('/presets/cart/{id}', [FrontendPurchaseController::class, 'cart'])->name('purchase.create');
Route::post('/presets/cart/{id}', [FrontendPurchaseController::class, 'store'])->name('purchase.store');
Route::get('/cart/{id}', [FrontendPurchaseController::class, 'cartview'])->name('cartview');



//Auth::routes();
// Routes for the edit of the user
Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change')->middleware('verified');
Route::post('user/change', [UserController::class, 'changeUser'])->name('user.change')->middleware('verified');

Route::get('email/restore/{id}/{email}', [UserController::class, 'restoreEmail'])->name('email.restore')->middleware('signed');
Route::post('email/restore/{id}/{email}', [UserController::class, 'restorePreviousEmail'])->name('email.restore')->middleware('signed');

// Routes BACKEND
Route::get('backend', [BackendController::class, 'main'])->name('backend.main')->middleware('auth');
Route::resource('backend/photo', BackendPhotoController::class, ['names' => 'backend.photo'])->middleware('auth', 'checkAdmin');
Route::resource('backend/preset', BackendPresetController::class, ['names' => 'backend.preset'])->middleware('auth', 'checkAdmin');
Route::get('backend/preset/{preset}/editcreate', [BackendPresetController::class, 'editCreate'])->name('backend.preset.editcreate');
Route::put('backend/preset/updatecreate/{preset}', [BackendPresetController::class, 'updateCreate'])->name('backend.preset');
Route::resource('backend/purchase', BackendPurchaseController::class, ['names' => 'backend.purchase'])->middleware('auth', 'checkAdmin');
Route::resource('backend/comment', BackendCommentController::class, ['names' => 'backend.comment'])->middleware('auth', 'checkAdmin');
Route::resource('backend/favourite', BackendFavouriteController::class, ['names' => 'backend.favourite'])->middleware('auth', 'checkAdmin');
Route::resource('backend/valuation', BackendValuationController::class, ['names' => 'backend.valuation'])->middleware('auth', 'checkAdmin');
Route::resource('backend/like', BackendLikeController::class, ['names' => 'backend.like'])->middleware('auth', 'checkAdmin');

Route::resource('backend/user', BackendUserController::class, ['names' => 'backend.user'])->middleware('auth', 'checkAdmin');

// Routes FRONTED
Route::resource('feed', FrontendPhotoController::class, ['names' => 'frontend.photo'])->middleware('auth');
Route::resource('preset', FrontendPresetController::class, ['names' => 'frontend.preset'])->middleware('auth');