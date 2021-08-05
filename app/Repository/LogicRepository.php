<?php
/*
|--------------------------------------------------------------------------
| Logic Repo
|--------------------------------------------------------------------------
|
| Here is where you we perform all application logic and complex queries which 
| are not simplistic enough to be in the Data Repository. 
| The principal focus of this class is all the recommendation logic of the API.
| This class exposes static methods that return data using a combination of Eloquent queries and PHP logic.
|
*/

namespace App\Repository;

use App\Models\Meal;
use App\Models\User;
use App\Models\MealItem;
use App\Models\ItemAllergy;

class LogicRepository
{
    public static function recommendSingleUser($user_id)
    {
       return static::recommend($user_id);
    }

    public static function recommendMultipleUsers($userList)
    {
        $listOfRecommendations = [];
        foreach($userList as $user_id)
        {
            $recommend = static::recommend($user_id);

            $listOfRecommendations[] = $recommend;
        }

        return $listOfRecommendations;
    }

    private static function recommend($user_id)
    {
        $user = User::select('id', 'name', 'email')->find($user_id);
        $user_allergies = $user->allergies()->pluck('allergy_id');
        $user_unsafe_items = ItemAllergy::whereIn('allergy_id', $user_allergies)->pluck('item_id');
        $user_unsafe_meals = MealItem::whereIn('item_id', $user_unsafe_items)->pluck('meal_id');
        $recommended_meals = Meal::whereNotIn('id', $user_unsafe_meals)->select('id', 'name', 'description')->with('items')->get();

        return [
            'user' => $user,
            'recommended_meals' => $recommended_meals
        ];
    }
}
