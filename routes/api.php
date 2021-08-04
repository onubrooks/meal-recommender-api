<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Repository\DataRepository;
use App\Repository\LogicRepository;
use App\Repository\Helpers;

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

/**
 * Fetch Meals
 *
 * Fetch a paginated list of all the meals in the recommender. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of meals queried from the API.
 */
Route::get('/meals', function (Request $request) {
    $paginate = $request->paginate ?? false;
    $data = DataRepository::fetchMeals($paginate);

    return Helpers::sendSuccessResponse($data);
});

/**
 * Add/Create/Update a Meal
 *
 * Create or update a meal record, supplying the name and description to be saved.
 *
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data Meal record just created or updated.
 */
Route::post('/meals', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);
    $data = DataRepository::saveMeal($request->all());

    return Helpers::sendSuccessResponse($data);
});

/*
|--------------------------------------------------------------------------
| ALLERGIES
|--------------------------------------------------------------------------
|
*/

/**
 * Fetch Allergies
 *
 * Fetch a paginated list of all the allergies in the recommender. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of allergies queried from the API.
 */
Route::get('/allergies', function (Request $request) {
    $paginate = $request->paginate ?? false;
    $data = DataRepository::fetchAllergies($paginate);

    return Helpers::sendSuccessResponse($data);
});

/**
 * Add/Create/Update an Allergy
 *
 * Create or update an allergy record, supplying the name and description to be saved.
 *
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data Allergy record just created or updated.
 */
Route::post('/allergies', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);

    $data = DataRepository::saveAllergy($request->all());

    return Helpers::sendSuccessResponse($data);
});

/*
|--------------------------------------------------------------------------
| ITEMS
|--------------------------------------------------------------------------
|
*/

/**
 * Fetch Items
 *
 * Fetch a paginated list of all the items in the recommender. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of items queried from the API.
 */
Route::get('/items', function (Request $request) {
    $paginate = $request->paginate ?? false;
    $data = DataRepository::fetchItems($paginate);

    return Helpers::sendSuccessResponse($data);
});

/**
 * Add/Create/Update an Item
 *
 * Create or update an item record, supplying the name and description to be saved.
 *
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data Item record just created or updated.
 */
Route::post('/items', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);
    $data = DataRepository::saveItem($request->all());

    return Helpers::sendSuccessResponse($data);
});

/*
|--------------------------------------------------------------------------
| USERS
|--------------------------------------------------------------------------
|
*/

/**
 * Fetch Users
 *
 * Fetch a paginated list of all the users in the recommender. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of users queried from the API.
 */
Route::get('/users', function (Request $request) {
    $paginate = $request->paginate ?? false;
    $data = DataRepository::fetchUsers($paginate);

    return Helpers::sendSuccessResponse($data);
});

/**
 * Add/Create/Update a User
 *
 * Create or update a user record, supplying the name, email and password to be saved.
 *
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data User record just created or updated.
 */
Route::post('/users', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string'],
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed'],
    ]);

    $data = DataRepository::saveUser($request->all());

    return Helpers::sendSuccessResponse($data);
});

Route::middleware('auth:api')->group(function () {
    /**
     * Fetch User Recommendations
     *
     * Fetch a list of a given users' recommended meals based on their allergies. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField data List of users' recommended meals.
     */
    Route::post('/users/recommend', function (Request $request) {
        $request->validate([
            'user_id' => ['required', 'integer'],
        ]);
        $data = LogicRepository::recommendSingleUser($request->user_id);

        return Helpers::sendSuccessResponse($data);
    });
});

/*
|--------------------------------------------------------------------------
| RECOMMEND
|--------------------------------------------------------------------------
|
*/
/**
 * Fetch Multiple Users Recommendations
 *
 * Fetch all recommended meals for a list of users' based on their allergies. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of recommended meals for each user.
 */
Route::post('/recommend', function (Request $request) {
    $request->validate([
        'users' => ['required', 'array'],
    ]);
    $data = LogicRepository::recommendMultipleUsers($request->users);

    return Helpers::sendSuccessResponse($data);
});

/*
|--------------------------------------------------------------------------
| MEALS => ITEMS
|--------------------------------------------------------------------------
|
*/

/**
 * Fetch Meal-Items
 *
 * Fetch a list of all 'meal-items' in the recommender. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of meal-items queried from the API.
 */
Route::get('/meal-items', function (Request $request) {
    $data = DataRepository::fetchMealItems($request->meal_id);

    return Helpers::sendSuccessResponse($data);
});

/**
 * Add/Create/Update Meal-Items
 *
 * Create or update one or more 'meal-item' record, supplying the meal_id and a list of items to be saved.
 *
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data 'Meal-Items' record just created or updated.
 */
Route::post('/meal-items', function (Request $request) {
    $request->validate([
        'meal_id' => ['required', 'integer'],
        'items' => ['required', 'array'],
    ]);
    $data = DataRepository::saveMealItem($request->items, $request->meal_id);

    return Helpers::sendSuccessResponse($data);
});

/*
|--------------------------------------------------------------------------
| ITEMS => ALLERGIES
|--------------------------------------------------------------------------
|
*/

/**
 * Fetch Item-Allergies
 *
 * Fetch a list of all 'item-allergies' in the recommender. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of 'item-allergies' queried from the API.
 */
Route::get('/item-allergies', function (Request $request) {
    return Item::find($request->item_id)->allergies();
});

/**
 * Add/Create/Update Item-Allergies
 *
 * Create or update one or more 'item-allergies' record, supplying the item_id and a list of allergies to be saved.
 *
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data 'Item-Allergies' record just created or updated.
 */
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

/**
 * Fetch User-Allergies
 *
 * Fetch a list of all 'user-allergies' in the recommender. If everything is okay, you'll get a 200 OK response.
 *
 * Otherwise, the request will fail with a 400 error, and an error field.
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data List of 'user-allergies' queried from the API.
 */
Route::get('/user-allergies', function (Request $request) {
    return User::find($request->item_id)->allergies();
});

/**
 * Add/Create/Update User-Allergies
 *
 * Create or update one or more 'user-allergies' record, supplying the user_id and list of allergies to be saved.
 *
 *
 * @response 400 scenario="Service is down or an unexpected error occurred".
 * @responseField status The status of this API (`success` or `error`).
 * @responseField data 'User-Allergies' record just created or updated.
 */
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
