<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $table = 'foodItem';
    protected $fillable = ['name', 'description', 'img_src', 'price', 'is_active'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories(){
        return $this->belongsToMany('App\Models\Categories', 'menu', 'food_id', 'category_id');
    }
}
