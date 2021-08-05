<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Repository\DataRepository;
use App\Repository\Helpers;

/**
 * @group Data Relationship Management
 *
 * APIs for managing data relationships, intermediate tables CRUD operations
 */
class DataRelationshipController extends Controller
{
    /**
     * Fetch Meal-Items
     *
     * Fetch a list of all 'meal-items' in the recommender. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     * 
     * @urlParam meal_id integer required The ID of the meal. Example: 1
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of meal-items queried from the API.
     */
    public function fetchMealItems($meal_id)
    {
        $data = Cache::remember("meal_items_$meal_id", 120, function () use ($meal_id) {
            return DataRepository::fetchMealItems($meal_id);
        });

        return Helpers::sendSuccessResponse($data, 'fetch meal-items successful');
    }

    /**
     * Add/Create/Update Meal-Items
     *
     * Create or update one or more 'meal-item' record, supplying the meal_id and a list of items to be saved.
     * 
     * @bodyParam meal_id integer Identifier of the meal. Example: 6
     * @bodyParam items object[] A list of items that are part of the meal. Example: [{"item_id": 12, "type": 'main'}]
     *
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
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
     * @urlParam item_id integer required The ID of the item. Example: 2
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of 'item-allergies' queried from the API.
     */
    public function fetchItemAllergies($item_id) {
        $data = Cache::remember("item_allergies_$item_id", 120, function () use ($item_id) {
            return DataRepository::fetchItemAllergies($item_id);
        });

        return Helpers::sendSuccessResponse($data, 'fetch item-allergies successful');
    }

    /**
     * Add/Create/Update Item-Allergies
     *
     * Create or update one or more 'item-allergies' record, supplying the item_id and a list of allergies to be saved.
     * 
     * @bodyParam item_id integer Identifier of the item. Example: 12
     * @bodyParam allergies object[] A list of allergies that are in the item. Example: [{"allergy_id": 1}]
     *
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data 'Item-Allergies' record just created or updated.
     */
    public function saveItemAllergies(Request $request) {
        $request->validate([
            'item_id' => ['required', 'integer'],
            'allergies' => ['required', 'array'],
            'allergies.*.allergy_id' => ['required', 'integer'],
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
     * @urlParam user_id integer required The ID of the user. Example: 1
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of 'user-allergies' queried from the API.
     */
    public function fetchUserAllergies($user_id) {
        $data = Cache::remember("user_allergies_$user_id", 120, function () use ($user_id) {
            return DataRepository::fetchUserAllergies($user_id);
        });

        return Helpers::sendSuccessResponse($data, 'fetch user-allergies successful');
    }

    /**
     * Add/Create/Update User-Allergies
     *
     * Create or update one or more 'user-allergies' record, supplying the user_id and list of allergies to be saved.
     * 
     * @bodyParam user_id integer Identifier of the item. Example: 3
     * @bodyParam allergies object[] A list of allergies that are in the item. Example: [{"allergy_id": 1}]
     *
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data 'User-Allergies' record just created or updated.
     */
    public function saveUserAllergies(Request $request) {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'allergies' => ['required', 'array'],
            'allergies.*.allergy_id' => ['required', 'integer'],
        ]);
        $data = DataRepository::saveUserAllergies($request->allergies, $request->user_id);

        return Helpers::sendSuccessResponse($data, 'save user allergies successful');
    }
}
