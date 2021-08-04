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
use App\Models\Allergy;
use App\Models\Item;
use App\Models\MealItem;
use App\Models\ItemAllergy;
use App\Models\UserAllergy;

class LogicRepository
{
    public static function recommendSingleUser($user_id)
    {
        $user = User::find($user_id);
        $user_allergies = $user->allergies()->pluck('allergy_id');
        $user_safe_items = ItemAllergy::whereNotIn('allergy_id', $user_allergies)->pluck('item_id');
        $user_safe_meals = MealItem::whereIn('item_id', $user_safe_items)->pluck('meal_id');
        $recommended_meals = Meal::where('id', $user_safe_meals)->with('items')->get();

        return $recommended_meals;
    }

    public static function recommendMultipleUsers($userList)
    {
        $listOfRecommendations = [];
        foreach($userList as $user_id)
        {
            $user = User::find($user_id);
            $user_allergies = $user->allergies()->pluck('allergy_id');
            $user_safe_items = ItemAllergy::whereNotIn('allergy_id', $user_allergies)->pluck('item_id');
            $user_safe_meals = MealItem::whereIn('item_id', $user_safe_items)->pluck('meal_id');
            $recommended_meals = Meal::where('id', $user_safe_meals)->with('items')->get();

            $listOfRecommendations[] = $recommended_meals;
        }

        return $listOfRecommendations;
    }
}
