<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categories
 *
 * @package App\Models
 */
class Categories extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'name', 'description', 'img_src', 'start_time', 'end_time'
    ];

    /**
     * Associate Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function foodItem()
    {
        return $this->belongsToMany(
            'App\Models\FoodItem',
            'menu',
            'category_id',
            'food_id'
        );
    }
}
