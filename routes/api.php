<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\MangaImagesController;
use App\Http\Controllers\ShopController;
use App\Models\MangaImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// //Create Shop
// Route::post('/admin/creatingshop', [ShopController::class, 'createShop']);

// // Fetch Shop
// Route::get('/admin/fetchingshop', [ShopController::class, 'fetchShop']);
// Route::get('/admin/fetchingshopname', [ShopController::class, 'fetchShopName']);

// //Create Group
// Route::get('/admin/createGroup', [GroupController::class, 'createGroup']);

//Create Genre
Route::post('/admin/creatingGenre',[GenreController::class,'creatingGenre']);
Route::get('/admin/fetchingGenre',[GenreController::class,'fetchingGenre']);
Route::put('/admin/updatingGenre/{id}',[GenreController::class,'updatingGenre']);
Route::delete('/admin/deletingGenre/{id}',[GenreController::class,'deleteGenre']);

//Create Manga
Route::post('/admin/creatingManga',[MangaController::class,'creatingManga']);
Route::get('/admin/fetchingManga',[MangaController::class,'fetchingManga']);
Route::get('/admin/fetchByMangaId/{id}',[MangaController::class,'fetchingByMangaId']);
Route::get('/admin/fetchLatestManga',[MangaController::class,'fetchingLatestManga']);
Route::post('/admin/updatingManga/{id}',[MangaController::class,'updatingManga']);
Route::delete('/admin/deletingManga/{id}/{image}',[MangaController::class,'deletingManga']);
Route::get('/admin/fetchingMangaByGenreId/{id}',[MangaController::class,'fetchingMangaByGenreId']);

//Create Episode
Route::post('/admin/creatingEpisode',[EpisodeController::class,'creatingEpisode']);
Route::get('/admin/fetchingEpisode/{id}',[EpisodeController::class,'fetchingEpisode']);
Route::delete('/admin/deletingEpisode/{id}',[EpisodeController::class,'deletingEpisode']);
//Create Images
Route::post('/admin/creatingImages/{id}',[MangaImagesController::class,'creatingImages']);
Route::get('/admin/gettingImageCount/{id}',[MangaImagesController::class,'gettingImageCount']);
//auth
Route::post('/msmanga/login',[AuthController::class,'loggingAuth']);
Route::post('/admin/msmanga/login',[AuthController::class,'loggingAdminAuth']);
Route::post('/msmanga/register',[AuthController::class,'addingAuth']);

//feedback
Route::post('/user/addingfeedback/{mangaId}/{userId}',[FeedbackController::class,'addingFeedback']);
Route::get('/user/gettingfeedback',[FeedbackController::class,'gettingFeedback']);