<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DataController;
use App\Http\Controllers\DataRelationshipController;
use App\Http\Controllers\RecommenderController;
use Illuminate\Support\Facades\Event;

// Event::listen('illuminate.query', function ($query) {
//     echo $query;
// });
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
| RECOMMEND
|--------------------------------------------------------------------------
|
*/

Route::post('/recommend', [RecommenderController::class, 'recommendMultipleUsers']);

Route::post('/recommend/user', [RecommenderController::class, 'recommendSingleUser']);

/*
|--------------------------------------------------------------------------
| MEALS
|--------------------------------------------------------------------------
|
*/

Route::get('/meals', [DataController::class, 'fetchMeals']);

Route::post('/meals', [DataController::class, 'saveMeal']);

/*
|--------------------------------------------------------------------------
| ALLERGIES
|--------------------------------------------------------------------------
|
*/

Route::get('/allergies', [DataController::class, 'fetchAllergies']);

Route::post('/allergies', [DataController::class, 'saveAllergy']);

/*
|--------------------------------------------------------------------------
| ITEMS
|--------------------------------------------------------------------------
|
*/

Route::get('/items', [DataController::class, 'fetchItems']);

Route::post('/items', [DataController::class, 'saveItem']);

/*
|--------------------------------------------------------------------------
| USERS
|--------------------------------------------------------------------------
|
*/

Route::get('/users', [DataController::class, 'fetchUsers']);


Route::post('/users', [DataController::class, 'saveUser']);

/*
|--------------------------------------------------------------------------
| MEALS => ITEMS
|--------------------------------------------------------------------------
|
*/

Route::get('/meal-items/{meal_id}', [DataRelationshipController::class, 'fetchMealItems']);

Route::post('/meal-items', [DataRelationshipController::class, 'saveMealItems']);

/*
|--------------------------------------------------------------------------
| ITEMS => ALLERGIES
|--------------------------------------------------------------------------
|
*/

Route::get('/item-allergies/{item_id}', [DataRelationshipController::class, 'fetchItemAllergies']);

Route::post('/item-allergies', [DataRelationshipController::class, 'saveItemAllergies']);

/*
|--------------------------------------------------------------------------
| USER => ALLERGIES
|--------------------------------------------------------------------------
|
*/

Route::get('/user-allergies/{user_id}', [DataRelationshipController::class, 'fetchUserAllergies']);

Route::post('/user-allergies', [DataRelationshipController::class, 'saveUserAllergies']);
