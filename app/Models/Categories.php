<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'description', 'img_src', 'start_time', 'end_time'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function foodItem(){
        return $this->belongsToMany('App\Model\FoodItem' , 'menu', 'category_id', 'food_id');
    }
}
