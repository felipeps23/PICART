<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

//RUTAS GENERALES
Route::get('/', function () {
    return redirect('/home');
});

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'indexlogged'])->name('indexlogged')->middleware('auth');;
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin');

Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change')->middleware('verified');
Route::post('user/change', [UserController::class, 'changeUser'])->name('user.change')->middleware('verified');

Route::get('email/restore/{id}/{email}', [UserController::class, 'restoreEmail'])->name('email.restore')->middleware('signed');
Route::post('email/restore/{id}/{email}', [UserController::class, 'restorePreviousEmail'])->name('email.restore')->middleware('signed');

//RUTAS BACKEND
Route::get('backend', [BackendController::class, 'main'])->name('backend.main')->middleware('auth', 'checkAdmin');
Route::resource('backend/photo', BackendPhotoController::class, ['names' => 'backend.photo'])->middleware('auth', 'checkAdmin'); //PHOTO
Route::resource('backend/preset', BackendPresetController::class, ['names' => 'backend.preset'])->middleware('auth', 'checkAdmin'); //PRESET
Route::get('backend/preset/{preset}/editcreate', [BackendPresetController::class, 'editCreate'])->name('backend.preset.editcreate'); //PRESET
Route::put('backend/preset/updatecreate/{preset}', [BackendPresetController::class, 'updateCreate'])->name('backend.preset'); //PRESET
Route::resource('backend/like', BackendLikeController::class, ['names' => 'backend.like'])->middleware('auth', 'checkAdmin'); //LIKE
Route::resource('backend/comment', BackendCommentController::class, ['names' => 'backend.comment'])->middleware('auth', 'checkAdmin'); //COMMENT
Route::resource('backend/favourite', BackendFavouriteController::class, ['names' => 'backend.favourite'])->middleware('auth', 'checkAdmin'); //FAVOURITE
Route::resource('backend/valuation', BackendValuationController::class, ['names' => 'backend.valuation'])->middleware('auth', 'checkAdmin'); //VALUATION
Route::resource('backend/purchase', BackendPurchaseController::class, ['names' => 'backend.purchase'])->middleware('auth', 'checkAdmin'); //PURCHASE

Route::resource('backend/user', BackendUserController::class, ['names' => 'backend.user'])->middleware('auth', 'checkAdmin'); //USER


//RUTAS FRONTEND
//PHOTOS
Route::resource('feed', FrontendPhotoController::class, ['names' => 'frontend.photo'])->middleware('auth');

Route::get('/myphotos', [FrontendPhotoController::class, 'myphotos'])->name('myphotos');
Route::get('/myphotos/create', [FrontendPhotoController::class, 'create'])->name('photo.create');
Route::post('/myphotos/create', [FrontendPhotoController::class, 'store'])->name('photo.store');
Route::get('/home/photos/{id}', [FrontendPhotoController::class, 'showphoto'])->name('showphoto');
Route::get('/home/photos/{id}/edit', [FrontendPhotoController::class, 'edit'])->name('photo.edit');
Route::put('/home/photos/{id}/edit', [FrontendPhotoController::class, 'update'])->name('photo.update');
Route::get('/home/photos/{id}/delete', [FrontendPhotoController::class, 'destroy'])->name('photo.delete');

//LIKES
Route::get('/mylikes', [FrontendLikeController::class, 'index'])->name('mylikes');
Route::post('/home/photos/like', [FrontendLikeController::class, 'store'])->name('like.create');
Route::get('delete/like/{idlike}/{id}/{iduser}', [FrontendLikeController::class, 'destroy']);

//COMMENTS
Route::post('comment/{id}', [FrontendPhotoController::class, 'createComment'])->name('createComment');
Route::get('comment/{id}/delete', [FrontendPhotoController::class, 'destroyComment'])->name('deleteComment');

//PRESETS
Route::resource('preset', FrontendPresetController::class, ['names' => 'frontend.preset'])->middleware('auth');

Route::get('/mypresets', [FrontendPresetController::class, 'mypresets'])->name('mypresets');
Route::get('/mypresets/create', [FrontendPresetController::class, 'create'])->name('preset.create');
Route::post('/mypresets/create', [FrontendPresetController::class, 'store'])->name('preset.store');
Route::get('mypresets/preset/{preset}/editcreate', [FrontendPresetController::class, 'editCreate'])->name('preset.editcreate');
Route::put('mypresets/preset/updatecreate/{preset}', [FrontendPresetController::class, 'updateCreate'])->name('preset.preset');
Route::get('/home/presets/{id}', [FrontendPresetController::class, 'showpreset'])->name('showpreset');
Route::get('/home/presets/{id}/edit', [FrontendPresetController::class, 'edit'])->name('preset.edit');
Route::put('/home/presets/{id}/edit', [FrontendPresetController::class, 'update'])->name('preset.update');
Route::get('/home/presets/{id}/delete', [FrontendPresetController::class, 'destroy'])->name('preset.delete');

//FAVOURITES
Route::get('/myfavourites', [FrontendFavouriteController::class, 'myfavourites'])->name('myfavourites');
Route::post('/home/presets/favourite', [FrontendFavouriteController::class, 'store'])->name('favourite.create');
Route::get('delete/favourite/{idfavourite}/{id}/{iduser}', [FrontendFavouriteController::class, 'destroy']);

//VALUATIONS
Route::post('valuation/{id}', [FrontendPresetController::class, 'createValuation'])->name('createValuation');
Route::get('valuation/{id}/delete', [FrontendPresetController::class, 'destroyValuation'])->name('destroyValuation');

//PURCHASE
Route::get('/myshopping', [FrontendPurchaseController::class, 'myshopping'])->name('myshopping');
Route::get('/presets/cart/{id}', [FrontendPurchaseController::class, 'beforecart'])->name('cart.create');
Route::post('buy/{id}', [FrontendPurchaseController::class, 'buypreset'])->name('buy');