<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chefs extends Model
{
    protected $fillable = ['name','title','fb_link','twitter_link', 'insta_link', 'skype_link', 'img_src'];
}
