<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $table = 'fooditem';
    protected $fillable = ['name', 'description', 'img_src', 'price', 'is_active'];

    /**
     * List of related categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(
            'App\Models\Categories',
            'menu',
            'food_id',
            'category_id'
        );
    }
}
