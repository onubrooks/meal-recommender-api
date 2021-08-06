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
        return Meal::with('items')->get();
    }

    public static function saveMeal($payload)
    {
        return Meal::updateOrCreate(
            ['name' => $payload['name']],
            ['name' => $payload['name'], 'description' => $payload['description'], 'image_url' => $payload['image_url']]
        );
    }

    public static function fetchAllergies($paginate = false)
    {
        if ($paginate) {
            return Allergy::paginate();
        }
        return Allergy::get();
    }

    public static function saveAllergy($payload)
    {
        return Allergy::updateOrCreate(
            ['name' => $payload['name']],
            ['name' => $payload['name'], 'description' => $payload['description']]
        );
    }

    public static function fetchItems($paginate = false)
    {
        if ($paginate) {
            return Item::with('allergies')->paginate();
        }
        return Item::with('allergies')->get();
    }

    public static function saveItem($payload)
    {
        return Item::updateOrCreate(
            ['name' => $payload['name']],
            ['name' => $payload['name'], 'description' => $payload['description']]
        );
    }

    public static function fetchUsers($paginate = false)
    {
        if ($paginate) {
            return User::with('allergies')->paginate();
        }
        return User::with('allergies')->get();
    }

    public static function saveUser($payload)
    {
        return User::updateOrCreate(
            ['email' => $payload['email']],
            ['name' => $payload['name'], 'email' => $payload['email'], 'password' => bcrypt($payload['password'])]
        );
    }

    public static function fetchMealItems($meal_id)
    {
        return Meal::with('items')->find($meal_id);
    }

    public static function saveMealItems($items, $meal_id)
    {
        foreach ($items as $item) {
            MealItem::updateOrCreate(
                ['meal_id' => $meal_id, 'item_id' => $item],
                ['meal_id' => $meal_id, 'item_id' => $item['item_id'], 'type' => $item['type']],
            );
        }
        return Meal::with('items')->find($meal_id);
    }

    public static function fetchItemAllergies($item_id)
    {
        return Item::with('allergies')->find($item_id);
    }

    public static function saveItemAllergies($allergies, $item_id)
    {
        foreach ($allergies as $allergy) {
            ItemAllergy::updateOrCreate(
                ['item_id' => $item_id, 'allergy_id' => $allergy['allergy_id']],
                ['item_id' => $item_id, 'allergy_id' => $allergy['allergy_id']],
            );
        }
        return Item::with('allergies')->find($item_id);
    }

    public static function fetchUserAllergies($user_id)
    {
        return User::with('allergies')->find($user_id);
    }

    public static function saveUserAllergies($allergies, $user_id)
    {
        foreach ($allergies as $allergy) {
            UserAllergy::updateOrCreate(
                ['user_id' => $user_id, 'allergy_id' => $allergy['allergy_id']],
                ['user_id' => $user_id, 'allergy_id' => $allergy['allergy_id']],
            );
        }
        return User::with('allergies')->find($user_id);
    }
}