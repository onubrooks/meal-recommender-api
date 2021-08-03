<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The allergies that belong to the item.
     */
    public function allergies()
    {
        return $this->belongsToMany(Allergy::class, 'item_allergies');
    }
}
