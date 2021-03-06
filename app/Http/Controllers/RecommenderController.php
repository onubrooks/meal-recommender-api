<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Repository\LogicRepository;
use App\Repository\Helpers;

/**
 * @group Meal Recommender
 *
 * Endpoints for fetching meal recommendations
 */
class RecommenderController extends Controller
{
    /**
     * Fetch User Recommendations
     *
     * Fetch a list of a given users' recommended meals based on their allergies. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     * 
     * @bodyParam user_id int required The id of the user. Example: 1
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of users' recommended meals.
     */
    public function recommendSingleUser(Request $request) {
        $request->validate([
            'user_id' => ['required', 'integer'],
        ]);
        $user_id = $request->user_id;

        $data = Cache::remember("recommend_single_$user_id", 60, function() use ($user_id) {
            return LogicRepository::recommendSingleUser($user_id);
        });
        return Helpers::sendSuccessResponse($data, 'fetch recommendations successful');
    }

    /**
     * Fetch Multiple Users Recommendations
     *
     * Fetch all recommended meals for a list of users' based on their allergies. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and an error field.
     * 
     * @bodyParam users integer[] required The list of IDs of users to fetch reccomendations. Example: [1, 2]
     *
     * @response 400 scenario="Service is down or an unexpected error occurred".
     * @responseField status The status of this API (`success` or `error`).
     * @responseField message The service message based on the status of the call.
     * @responseField data List of recommended meals for each user.
     */
    public function recommendMultipleUsers(Request $request) {
        $request->validate([
            'users' => ['required', 'array'],
        ]);
        $data = LogicRepository::recommendMultipleUsers($request->users);

        return Helpers::sendSuccessResponse($data, 'fetch recommendations successful');
    }
}
