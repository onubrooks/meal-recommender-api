<?php

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

/*
|--------------------------------------------------------------------------
| MEALS
|--------------------------------------------------------------------------
|
*/
Route::get('/meals', function (Request $request) {
    return $request->user();
});
Route::post('/meals', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| ALLERGIES
|--------------------------------------------------------------------------
|
*/
Route::get('/allergies', function (Request $request) {
    return $request->user();
});
Route::post('/allergies', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| ITEMS
|--------------------------------------------------------------------------
|
*/
Route::get('/items', function (Request $request) {
    return $request->user();
});
Route::post('/items', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| USERS
|--------------------------------------------------------------------------
|
*/
Route::get('/users', function (Request $request) {
    return $request->user();
});
Route::post('/users', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function () {
    Route::get('/users/allergies', function (Request $request) {
        return $request->user();
    });
    Route::post('/users/allergies', function (Request $request) {
        return $request->user();
    });
    Route::post('/users/recommendations', function (Request $request) {
        return $request->user();
    });
});

/*
|--------------------------------------------------------------------------
| SYSTEM
|--------------------------------------------------------------------------
|
*/
Route::post('/recommendations', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| MEALS => ITEMS
|--------------------------------------------------------------------------
|
*/
Route::get('/meal-items', function (Request $request) {
    return $request->user();
});
Route::post('/meal-items', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| ITEMS => ALLERGIES
|--------------------------------------------------------------------------
|
*/
Route::get('/item-allergies', function (Request $request) {
    return $request->user();
});
Route::post('/item-allergies', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| USER => ALLERGIES
|--------------------------------------------------------------------------
|
*/
Route::get('/user-allergies', function (Request $request) {
    return $request->user();
});
Route::post('/user-allergies', function (Request $request) {
    return $request->user();
});
