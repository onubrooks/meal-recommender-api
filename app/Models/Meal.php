<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    /**
     * The items that belong to the meal.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'meal_items');
    }
}
