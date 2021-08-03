<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Meal;
use App\Models\User;
use App\Models\Allergy;
use App\Models\Item;
use App\Models\MealItem;
use App\Models\ItemAllergy;
use App\Models\UserAllergy;

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
    return Meal::paginate();
});
Route::post('/meals', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);
    return Meal::updateOrCreate(
        ['name' => $request->name],
        ['name' => $request->name, 'description' => $request->description]
    );
});

/*
|--------------------------------------------------------------------------
| ALLERGIES
|--------------------------------------------------------------------------
|
*/
Route::get('/allergies', function (Request $request) {
    return Allergy::paginate();
});
Route::post('/allergies', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);
    return Allergy::updateOrCreate(
        ['name' => $request->name],
        ['name' => $request->name, 'description' => $request->description]
    );
});

/*
|--------------------------------------------------------------------------
| ITEMS
|--------------------------------------------------------------------------
|
*/
Route::get('/items', function (Request $request) {
    return Item::paginate();
});
Route::post('/items', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);
    return Item::updateOrCreate(
        ['name' => $request->name],
        ['name' => $request->name, 'description' => $request->description]
    );
});

/*
|--------------------------------------------------------------------------
| USERS
|--------------------------------------------------------------------------
|
*/
Route::get('/users', function (Request $request) {
    return User::paginate();
});
Route::post('/users', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed'],
    ]);
    return User::updateOrCreate(
        ['email' => $request->email],
        ['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]
    );
});
Route::middleware('auth:api')->group(function () {
    Route::post('/users/recommendations', function (Request $request) {
        return $request->user();
    });
});

/*
|--------------------------------------------------------------------------
| RECOMMEND
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
    return Meal::find($request->meal_id)->items();
});
Route::post('/meal-items', function (Request $request) {
    $request->validate([
        'meal_id' => ['required', 'integer'],
        'items' => ['required', 'array'],
    ]);
    $items = collect($request->items);
    foreach ($items as $item) {
        MealItem::updateOrCreate(
            ['meal_id' => $request->meal_id, 'item_id', $item],
            ['meal_id' => $request->meal_id, 'item_id', $item],
        );
    }
    return Meal::find($request->meal_id)->items();
});

/*
|--------------------------------------------------------------------------
| ITEMS => ALLERGIES
|--------------------------------------------------------------------------
|
*/
Route::get('/item-allergies', function (Request $request) {
    return Item::find($request->item_id)->allergies();
});
Route::post('/item-allergies', function (Request $request) {
    $request->validate([
        'item_id' => ['required', 'integer'],
        'allergies' => ['required', 'array'],
    ]);
    $allergies = collect($request->allergies);
    foreach ($allergies as $allergy) {
        ItemAllergy::updateOrCreate(
            ['item_id' => $request->item_id, 'allergy_id', $allergy],
            ['item_id' => $request->item_id, 'allergy_id', $allergy],
        );
    }
    return Item::find($request->item_id)->allergies();
});

/*
|--------------------------------------------------------------------------
| USER => ALLERGIES
|--------------------------------------------------------------------------
|
*/
Route::get('/user-allergies', function (Request $request) {
    return User::find($request->item_id)->allergies();
});
Route::post('/user-allergies', function (Request $request) {
    $request->validate([
        'user_id' => ['required', 'integer'],
        'allergies' => ['required', 'array'],
    ]);
    $allergies = collect($request->allergies);
    foreach ($allergies as $allergy) {
        UserAllergy::updateOrCreate(
            ['user_id' => $request->user_id, 'allergy_id', $allergy],
            ['user_id' => $request->user_id, 'allergy_id', $allergy],
        );
    }
    return User::find($request->item_id)->allergies();
});
