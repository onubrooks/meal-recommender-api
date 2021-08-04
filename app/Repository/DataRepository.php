<?php 
/*
|--------------------------------------------------------------------------
| Data Repo
|--------------------------------------------------------------------------
|
| Here is where you we fetch or query all sorts of data ranging from users to meals to items and allergies.
| This class exposes static methods that return data using the Eloquent ORM.
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

class DataRepository{
    public static function fetchMeals($paginate = false)
    {
        if($paginate)
        {
            return Meal::with('items')->paginate();
        }
        return Meal::with('items')->all();
    }

    public static function saveMeal($payload)
    {
        return Meal::updateOrCreate(
            ['name' => $payload->name],
            ['name' => $payload->name, 'description' => $payload->description]
        );
    }

    public static function fetchAllergies($paginate = false)
    {
        if ($paginate) {
            return Allergy::paginate();
        }
        return Allergy::all();
    }

    public static function saveAllergy($payload)
    {
        return Allergy::updateOrCreate(
            ['name' => $payload->name],
            ['name' => $payload->name, 'description' => $payload->description]
        );
    }

    public static function fetchItems($paginate = false)
    {
        if ($paginate) {
            return Item::paginate();
        }
        return Item::all();
    }

    public static function saveItem($payload)
    {
        return Item::updateOrCreate(
            ['name' => $payload->name],
            ['name' => $payload->name, 'description' => $payload->description]
        );
    }

    public static function fetchUsers($paginate = false)
    {
        if ($paginate) {
            return User::paginate();
        }
        return User::all();
    }

    public static function saveUser($payload)
    {
        return User::updateOrCreate(
            ['email' => $payload->email],
            ['name' => $payload->name, 'email' => $payload->email, 'password' => bcrypt($payload->password)]
        );
    }

    public static function fetchMealItems($meal_id)
    {
        return Meal::find($meal_id)->items();
    }

    public static function saveMealItem($items, $meal_id)
    {
        foreach ($items as $item) {
            MealItem::updateOrCreate(
                ['meal_id' => $meal_id, 'item_id', $item],
                ['meal_id' => $meal_id, 'item_id', $item],
            );
        }
        return Meal::find($meal_id)->items();
    }
}