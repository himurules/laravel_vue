<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public function categories(){
        return $this->belongsTo('App\Models\Categories','category_id');
    }

    public function foodItem(){
        return $this->belongsTo('App\Models\FoodItem', 'food_id');
    }
}
