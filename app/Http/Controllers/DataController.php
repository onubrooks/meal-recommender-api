<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Repository\DataRepository;
use App\Repository\Helpers;

/**
 * @group Data Management
 *
 * APIs for managing data CRUD operations
 */
class DataController extends Controller
{
    /**
     * Fetch Meals
     *
     * Fetch a paginated list of all the meals in the recommender. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of meals queried from the API.
     */
    public function fetchMeals(Request $request) 
    {
        $paginate = $request->paginate ?? false;
        $data = Cache::remember('meals', 120, function () use ($paginate) {
            return DataRepository::fetchMeals($paginate);
        });

        return Helpers::sendSuccessResponse($data, 'fetch meals successful');
    }

    /**
     * Add/Create/Update a Meal
     *
     * Create or update a meal record, supplying the name and description to be saved.
     * 
     * @bodyParam name string Name of the meal. Example: Grilled Fish with Spice Chilli
     * @bodyParam description string Brief description. Example: This is the description
     *
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data Meal record just created or updated.
     */
    public function saveMeal(Request $request) 
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image_url' => ['nullable', 'string'],
        ]);
        $data = DataRepository::saveMeal($request->all());

        return Helpers::sendSuccessResponse($data, 'save meal successful');
    }

    /**
     * Fetch Allergies
     *
     * Fetch a paginated list of all the allergies in the recommender. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of allergies queried from the API.
     */
    public function fetchAllergies(Request $request) {
        $paginate = $request->paginate ?? false;
        $data = Cache::remember('allergies', 120, function () use ($paginate) {
            return DataRepository::fetchAllergies($paginate);
        });

        return Helpers::sendSuccessResponse($data, 'fetch allergies successful');
    }

    /**
     * Add/Create/Update an Allergy
     *
     * Create or update an allergy record, supplying the name and description to be saved.
     * 
     * @bodyParam name string Name of the allergy. Example: Fish Allergy
     * @bodyParam description string Brief description of the allergy. Example: Allergic to fish!
     *
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data Allergy record just created or updated.
     */
    public function saveAllergy(Request $request) {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        return Helpers::sendErrorResponse('cannot create allergy, only 3 allergies are currently supported');

        // $data = DataRepository::saveAllergy($request->all());

        // return Helpers::sendSuccessResponse($data, 'save allergy successful');
    }

    /**
     * Fetch Items
     *
     * Fetch a paginated list of all the items in the recommender. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of items queried from the API.
     */
    public function fetchItems(Request $request) {
        $paginate = $request->paginate ?? false;
        $data = Cache::remember('items', 120, function () use ($paginate) {
            return DataRepository::fetchItems($paginate);
        });

        return Helpers::sendSuccessResponse($data, 'fetch items successful');
    }

    /**
     * Add/Create/Update an Item
     *
     * Create or update an item record, supplying the name and description to be saved.
     * 
     * @bodyParam name string Name of the item. Example: Roast Fish
     * @bodyParam description string Brief description of the item. Example: fish roasted with hot fire
     *
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data Item record just created or updated.
     */
    public function saveItem(Request $request) {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        $data = DataRepository::saveItem($request->all());

        return Helpers::sendSuccessResponse($data, 'save item successful');
    }

    /**
     * Fetch Users
     *
     * Fetch a paginated list of all the users in the recommender. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of users queried from the API.
     */
    public function fetchUsers(Request $request) {
        $paginate = $request->paginate ?? false;
        $data = Cache::remember('users', 120, function () use ($paginate) {
            return DataRepository::fetchUsers($paginate);
        });

        return Helpers::sendSuccessResponse($data, 'fetch users successful');
    }

    /**
     * Add/Create/Update a User
     *
     * Create or update a user record, supplying the name, email and password to be saved.
     * 
     * @bodyParam name string Name of the user. Example: Idris Elba
     * @bodyParam email string User email. Example: elba@onubrooks.io
     * @bodyParam password string User password. Example: password
     * @bodyParam password_confirmation string Password confirmation. Example: password
     *
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data User record just created or updated.
     */
    public function saveUser(Request $request) {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = DataRepository::saveUser($request->all());

        return Helpers::sendSuccessResponse($data, 'save user successful');
    }

}
