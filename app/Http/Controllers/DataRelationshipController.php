<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repository\DataRepository;
use App\Repository\Helpers;

class DataRelationshipController extends Controller
{
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
    public function fetchMealItems(Request $request)
    {
        $request->validate([
            'meal_id' => ['required', 'integer'],
        ]);
        $data = DataRepository::fetchMealItems($request->meal_id);

        return Helpers::sendSuccessResponse($data, 'fetch meal-items successful');
    }

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
    public function saveMealItems(Request $request)
    {
        $request->validate([
            'meal_id' => ['required', 'integer'],
            'items' => ['required', 'array'],
            'items.*.item_id' => ['required', 'integer'],
            'items.*.type' => ['required', 'string'],
        ]);
        $data = DataRepository::saveMealItems($request->items, $request->meal_id);

        return Helpers::sendSuccessResponse($data, 'save meal-items successful');
    }

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
    public function fetchItemAllergies(Request $request) {
        $request->validate([
            'item_id' => ['required', 'integer'],
        ]);
        $data = DataRepository::fetchItemAllergies($request->item_id);

        return Helpers::sendSuccessResponse($data, 'fetch item-allergies successful');
    }

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
    public function saveItemAllergies(Request $request) {
        $request->validate([
            'item_id' => ['required', 'integer'],
            'allergies' => ['required', 'array'],
        ]);
        $data = DataRepository::saveItemAllergies($request->allergies, $request->item_id);

        return Helpers::sendSuccessResponse($data, 'save item-allergies successful');
        
    }

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
    public function fetchUserAllergies(Request $request) {
        $request->validate([
            'user_id' => ['required', 'integer'],
        ]);
        $data = DataRepository::fetchUserAllergies($request->user_id);

        return Helpers::sendSuccessResponse($data, 'fetch user-allergies successful');
    }

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
    public function saveUserAllergies(Request $request) {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'allergies' => ['required', 'array'],
        ]);
        $data = DataRepository::saveUserAllergies($request->allergies, $request->user_id);

        return Helpers::sendSuccessResponse($data, 'save user allergies successful');
    }
}
