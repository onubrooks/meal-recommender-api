<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image_url'
    ];

    /**
     * The items that belong to the meal.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'meal_items')->select(['id', 'name', 'description']);
    }
}
